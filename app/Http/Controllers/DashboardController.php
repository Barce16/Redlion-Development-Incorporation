<?php

namespace App\Http\Controllers;

use App\Models\PropertyListing;
use App\Models\Transaction;
use App\Models\Customer;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        // Get statistics
        $totalProperties = PropertyListing::count();
        $totalValue = PropertyListing::sum('price');
        $totalSales = Transaction::where('status', 'paid')->count();
        $totalCustomers = Customer::count();

        // Get recent transactions
        $recentTransactions = Transaction::with(['customer', 'property'])
            ->latest()
            ->limit(6)
            ->get();

        // Get properties for showcase
        $topProperties = PropertyListing::orderByDesc('views')
            ->limit(4)
            ->get();

        // Get reminders (upcoming transactions)
        $reminders = Transaction::where('status', 'pending')
            ->with('customer')
            ->latest()
            ->limit(5)
            ->get();

        return view('dashboard', [
            'totalProperties' => $totalProperties,
            'totalValue' => $totalValue,
            'totalSales' => $totalSales,
            'totalCustomers' => $totalCustomers,
            'recentTransactions' => $recentTransactions,
            'topProperties' => $topProperties,
            'reminders' => $reminders,
        ]);
    }
}
