<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Customer;
use App\Models\PropertyListing;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TransactionController extends Controller
{
    public function index(Request $request): View
    {
        // Get statistics (across all transactions)
        $totalTransactions = Transaction::count();
        $totalRevenue = Transaction::sum('amount');
        $completedTransactions = Transaction::where('status', 'paid')->count();
        $pendingTransactions = Transaction::where('status', 'pending')->count();

        // Build query with optional filters
        $query = Transaction::with(['customer', 'property']);

        if ($request->filled('search')) {
            $s = $request->input('search');
            $query->where(function ($q) use ($s) {
                $q->where('invoice_code', 'like', "%{$s}%")
                  ->orWhereHas('customer', fn($q2) => $q2->where('name', 'like', "%{$s}%"))
                  ->orWhereHas('property', fn($q2) => $q2->where('title', 'like', "%{$s}%"));
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        // Paginate results with query string preserved
        $transactions = $query->latest('transaction_date')
            ->paginate(9)
            ->withQueryString();

        return view('transaction', [
            'transactions' => $transactions,
            'totalTransactions' => $totalTransactions,
            'totalRevenue' => $totalRevenue,
            'completedTransactions' => $completedTransactions,
            'pendingTransactions' => $pendingTransactions,
            'search' => $request->input('search'),
            'status' => $request->input('status'),
        ]);
    }

    public function create(Request $request): View
    {
        $customers = Customer::all();
        $properties = PropertyListing::all();
        $invoices = \App\Models\Invoice::all();
        // allow a customer to be pre-selected via query string
        $selectedCustomer = $request->input('customer_id');
        return view('transactions.create', [
            'customers' => $customers,
            'properties' => $properties,
            'invoices' => $invoices,
            'selectedCustomer' => $selectedCustomer,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'property_id' => 'required|exists:property_listings,id',
            'invoice_id' => 'nullable|exists:invoices,id',
            'invoice_code' => 'nullable|string|unique:transactions,invoice_code',
            'property_type' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'amount_paid' => 'nullable|numeric|min:0',
            'remaining_balance' => 'nullable|numeric|min:0',
            'payment_type' => 'required|in:cash,gcash,card',
            'gcash_reference' => 'nullable|string',
            'sender_name' => 'nullable|string',
            'card_type' => 'nullable|string',
            'card_last4' => 'nullable|string|max:4',
            'auth_code' => 'nullable|string',
            'terminal_info' => 'nullable|string',
            'status' => 'required|in:pending,completed,failed,refunded,cancelled',
            'transaction_date' => 'required|date',
            'or_number' => 'nullable|string',
            'notes' => 'nullable|string',
            'attachment_path' => 'nullable|string',
            'recorded_by' => 'nullable|exists:users,id',
        ]);

        Transaction::create($validated);

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    public function show(Transaction $transaction): View
    {
        $transaction->load(['customer', 'property']);
        return view('transactions.show', ['transaction' => $transaction]);
    }

    public function edit(Transaction $transaction): View
    {
        $customers = Customer::all();
        $properties = PropertyListing::all();
        $invoices = Invoice::where('customer_id', $transaction->customer_id)
            ->with('property')
            ->get();
        return view('transactions.edit', [
            'transaction' => $transaction,
            'customers' => $customers,
            'properties' => $properties,
            'invoices' => $invoices,
        ]);
    }

    public function update(Request $request, Transaction $transaction): RedirectResponse
    {
        $validated = $request->validate([
            'invoice_id' => 'nullable|exists:invoices,id',
            'invoice_code' => 'nullable|string|unique:transactions,invoice_code,' . $transaction->id,
            'status' => 'in:pending,completed,failed,refunded,cancelled',
            'amount' => 'numeric|min:0',
            'amount_paid' => 'nullable|numeric|min:0',
            'remaining_balance' => 'nullable|numeric|min:0',
            'payment_type' => 'in:cash,gcash,card',
            'gcash_reference' => 'nullable|string',
            'sender_name' => 'nullable|string',
            'card_type' => 'nullable|string',
            'card_last4' => 'nullable|string|max:4',
            'auth_code' => 'nullable|string',
            'terminal_info' => 'nullable|string',
            'transaction_date' => 'date',
            'or_number' => 'nullable|string',
            'notes' => 'nullable|string',
            'attachment_path' => 'nullable|string',
            'recorded_by' => 'nullable|exists:users,id',
        ]);

        $transaction->update($validated);

        return redirect()->route('transactions.show', $transaction)->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction): RedirectResponse
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
