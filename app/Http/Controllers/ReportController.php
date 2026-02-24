<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\PropertyListing;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function index(): View
    {
        // Calculate key metrics
        $totalRevenue = Transaction::where('status', 'paid')->sum('amount');
        $totalSales = Transaction::where('status', 'paid')->count();
        $avgTransactionValue = $totalSales > 0 ? $totalRevenue / $totalSales : 0;

        // Calculate conversion rate (sales / total properties views)
        $totalViews = PropertyListing::sum('views');
        $conversionRate = $totalViews > 0 ? round(($totalSales / $totalViews) * 100, 2) : 0;

        // Get top performing properties
        $topProperties = PropertyListing::selectRaw('id, title, type, views, sales')
            ->with(['transactions' => function ($query) {
                $query->where('status', 'paid');
            }])
            ->withCount('transactions')
            ->latest('views')
            ->limit(5)
            ->get()
            ->map(function ($property) {
                return [
                    'id' => $property->id,
                    'title' => $property->title,
                    'type' => $property->type,
                    'views' => $property->views,
                    'inquiries' => $property->transactions_count,
                    'sales' => $property->sales,
                    'revenue' => $property->transactions->sum('amount'),
                ];
            });

        // Get property type distribution
        $propertyTypeDistribution = PropertyListing::selectRaw('type, COUNT(*) as count, SUM(sales) as total_sales')
            ->groupBy('type')
            ->get();

        // Calculate percentage distribution
        $totalTypes = $propertyTypeDistribution->sum('count');
        $typePercentages = $propertyTypeDistribution->map(function ($item) use ($totalTypes) {
            return [
                'type' => ucfirst($item->type),
                'percentage' => $totalTypes > 0 ? round(($item->count / $totalTypes) * 100) : 0,
                'sales' => $item->total_sales ?? 0,
            ];
        });

        // Get revenue trend data (weekly)
        $revenueData = [];
        for ($i = 5; $i >= 0; $i--) {
            $startDate = now()->subWeeks($i)->startOfWeek();
            $endDate = $startDate->copy()->endOfWeek();

            $weekRevenue = Transaction::where('status', 'paid')
                ->whereBetween('transaction_date', [$startDate, $endDate])
                ->sum('amount');

            $revenueData[] = [
                'week' => 'Week ' . ($i + 1),
                'revenue' => $weekRevenue,
            ];
        }

        return view('reports', [
            'totalRevenue' => $totalRevenue,
            'totalSales' => $totalSales,
            'avgTransactionValue' => $avgTransactionValue,
            'conversionRate' => $conversionRate,
            'topProperties' => $topProperties,
            'typePercentages' => $typePercentages,
            'revenueData' => $revenueData,
        ]);
    }
}
