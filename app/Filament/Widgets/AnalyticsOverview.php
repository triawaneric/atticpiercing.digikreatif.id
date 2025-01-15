<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use App\Models\Order;
use Filament\Widgets\Widget;
use Illuminate\Support\Carbon;

class AnalyticsOverview extends Widget
{
    protected static string $view = 'widgets.analytics-overview';

    public function getData(): array
    {
        $today = Carbon::today();
        $weekStart = Carbon::now()->startOfWeek();
        $monthStart = Carbon::now()->startOfMonth();

        return [
            'bookingCount' => Booking::count(),
//            'orderCountToday' => Order::whereDate('created_at', $today)->count(),
//            'orderCountThisWeek' => Order::whereBetween('created_at', [$weekStart, now()])->count(),
//            'orderCountThisMonth' => Order::whereBetween('created_at', [$monthStart, now()])->count(),
//            'recentOrders' => Order::latest()->take(5)->get(),
        ];
    }
}
