<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CustomerController extends Controller
{
    public function index(): View
    {
        // Get statistics
        $totalCustomers = Customer::count();
        $activeCustomers = Customer::where('status', 'active')->count();
        $totalRevenue = Customer::sum('total_spent');
        $newThisMonth = Customer::whereMonth('joined_at', now()->month)
            ->whereYear('joined_at', now()->year)
            ->count();

        // Get all customers
        $customers = Customer::paginate(6);

        return view('customer', [
            'customers' => $customers,
            'totalCustomers' => $totalCustomers,
            'activeCustomers' => $activeCustomers,
            'totalRevenue' => $totalRevenue,
            'newThisMonth' => $newThisMonth,
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
            'status' => 'required|in:active,inactive',
        ]);

        Customer::create(array_merge($validated, [
            'joined_at' => now(),
        ]));

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    public function show(Customer $customer): View
    {
        $customer->load(['transactions', 'messages', 'user']);
        return view('customers.show', ['customer' => $customer]);
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
            'status' => 'in:active,inactive',
        ]);

        $customer->update($validated);

        return redirect()->route('customers.show', $customer)->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer): RedirectResponse
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
