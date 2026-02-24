<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Customer;
use App\Models\PropertyListing;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TransactionController extends Controller
{
    public function index(): View
    {
        // Get statistics
        $totalTransactions = Transaction::count();
        $totalRevenue = Transaction::sum('amount');
        $completedTransactions = Transaction::where('status', 'paid')->count();
        $pendingTransactions = Transaction::where('status', 'pending')->count();

        // Get all transactions with relationships
        $transactions = Transaction::with(['customer', 'property'])
            ->latest('transaction_date')
            ->paginate(9);

        return view('transaction', [
            'transactions' => $transactions,
            'totalTransactions' => $totalTransactions,
            'totalRevenue' => $totalRevenue,
            'completedTransactions' => $completedTransactions,
            'pendingTransactions' => $pendingTransactions,
        ]);
    }

    public function create(): View
    {
        $customers = Customer::all();
        $properties = PropertyListing::all();
        return view('transactions.create', [
            'customers' => $customers,
            'properties' => $properties,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'property_id' => 'required|exists:property_listings,id',
            'invoice_id' => 'required|string|unique:transactions',
            'property_type' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|in:credit_card,debit_card,bank_transfer,paypal,check',
            'payment_card' => 'required|in:visa,mastercard,paypal,bank_transfer',
            'status' => 'required|in:pending,completed,paid,cancelled',
            'transaction_date' => 'required|date',
            'notes' => 'nullable|string',
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
        return view('transactions.edit', [
            'transaction' => $transaction,
            'customers' => $customers,
            'properties' => $properties,
        ]);
    }

    public function update(Request $request, Transaction $transaction): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'in:pending,completed,paid,cancelled',
            'amount' => 'numeric|min:0',
            'payment_method' => 'in:credit_card,debit_card,bank_transfer,paypal,check',
            'payment_card' => 'in:visa,mastercard,paypal,bank_transfer',
            'transaction_date' => 'date',
            'notes' => 'nullable|string',
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
