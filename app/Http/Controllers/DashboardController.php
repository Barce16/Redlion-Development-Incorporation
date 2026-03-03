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

        // status breakdown for pie chart
        $statusCounts = Transaction::select('status', \DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');
        $totalStatusCount = $statusCounts->sum();

        // calendar controls: allow month/year via query string
        $queryMonth = request()->query('month');
        $queryYear = request()->query('year');
        $now = null;
        if ($queryMonth && $queryYear) {
            try {
                $now = \Carbon\Carbon::create($queryYear, $queryMonth, 1);
            } catch (\Exception $e) {
                $now = \Carbon\Carbon::now();
            }
        }
        if (!$now) {
            $now = \Carbon\Carbon::now();
        }

        // generic holiday list (month-day => name)
        $holidayList = [
            '01-01' => 'New Year\'s Day',
            '02-25' => 'People Power Revolution',
            '04-09' => 'Araw ng Kagitingan',
            '05-01' => 'Labor Day',
            '06-12' => 'Independence Day',
            '08-21' => 'Ninoy Aquino Day',
            '11-01' => 'All Saints\' Day',
            '11-30' => 'Bonifacio Day',
            '12-25' => 'Christmas Day',
            '12-30' => 'Rizal Day',
        ];
        // restrict to current month
        $monthlyHolidays = [];
        foreach ($holidayList as $md => $name) {
            [$m, $d] = explode('-', $md);
            if ((int)$m === $now->month) {
                $monthlyHolidays[(int)$d] = $name;
            }
        }

        // previous / next month for navigation
        $prev = $now->copy()->subMonth();
        $next = $now->copy()->addMonth();

        return view('dashboard', [
            'totalProperties' => $totalProperties,
            'totalValue' => $totalValue,
            'totalSales' => $totalSales,
            'totalCustomers' => $totalCustomers,
            'recentTransactions' => $recentTransactions,
            'topProperties' => $topProperties,
            'reminders' => $reminders,
            'statusCounts' => $statusCounts,
            'totalStatusCount' => $totalStatusCount,
            'calendarNow' => $now,
            'monthlyHolidays' => $monthlyHolidays,
            'prevMonth' => $prev,
            'nextMonth' => $next,
        ]);
    }
}
