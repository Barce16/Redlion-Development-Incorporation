<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CustomerController extends Controller
{
    public function index(Request $request): View
    {
        // build base customer query
        $baseQuery = Customer::query();
        if ($search = $request->input('search')) {
            $baseQuery->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Get statistics from filtered set
        $totalCustomers = (clone $baseQuery)->count();
        $activeCustomers = (clone $baseQuery)->where('status', 'active')->count();
        $totalRevenue = (clone $baseQuery)->sum('total_spent');
        $newThisMonth = (clone $baseQuery)
            ->whereMonth('joined_at', now()->month)
            ->whereYear('joined_at', now()->year)
            ->count();

        // calculate growth percent versus last month
        $lastMonthCustomers = (clone $baseQuery)
            ->whereYear('joined_at', now()->subMonth()->year)
            ->whereMonth('joined_at', now()->subMonth()->month)
            ->count();
        $growthPct = null;
        if ($lastMonthCustomers > 0) {
            $growthPct = round((($totalCustomers - $lastMonthCustomers) / $lastMonthCustomers) * 100);
        }

        // Get paginated customers preserving search
        $customers = (clone $baseQuery)->paginate(6)->appends($request->only('search'));

        return view('customer', [
            'customers' => $customers,
            'totalCustomers' => $totalCustomers,
            'activeCustomers' => $activeCustomers,
            'totalRevenue' => $totalRevenue,
            'newThisMonth' => $newThisMonth,
            'growthPct' => $growthPct,
            'search' => $search,
        ]);
    }

    public function create(): View
    {
        return view('customers.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers',
            'phone' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            // inquire status for initial inquiries, active once meeting/payment occurs
            'status' => 'required|in:inquire,active,inactive',
        ]);
        // set joined_at on create if active
        if (($validated['status'] ?? '') === 'active') {
            $validated['joined_at'] = now();
        }
        Customer::create($validated);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    public function show(Customer $customer): View
    {
        // eager load non-transaction relations
        $customer->load(['messages', 'user']);

        // paginate the customer's transactions, include property relation
        $transactions = $customer->transactions()
            ->with('property')
            ->latest()
            ->paginate(10);

        return view('customers.show', [
            'customer' => $customer,
            'transactions' => $transactions,
        ]);
    }

    public function edit(Customer $customer): View
    {
        return view('customers.edit', ['customer' => $customer]);
    }

    public function update(Request $request, Customer $customer): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|unique:customers,email,' . $customer->id,
            'phone' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'status' => 'in:inquire,active,inactive',
        ]);

        // if switching to active and joined_at not already set, stamp it
        if (($validated['status'] ?? $customer->status) === 'active' && is_null($customer->joined_at)) {
            $validated['joined_at'] = now();
        }

        $customer->update($validated);

        return redirect()->route('customers.show', $customer)->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer): RedirectResponse
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
