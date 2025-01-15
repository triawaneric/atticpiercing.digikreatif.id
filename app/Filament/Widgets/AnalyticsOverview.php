<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
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
            // Total Bookings
            'bookingCount' => Booking::query()->count(),

            // Bookings Today
            'bookingsToday' => Booking::query()->whereDate('created_at', $today)->count(),

            // Bookings This Week
            'bookingsThisWeek' => Booking::query()->whereBetween('created_at', [$weekStart, now()])->count(),

            // Bookings This Month
            'bookingsThisMonth' => Booking::query()->whereBetween('created_at', [$monthStart, now()])->count(),

            // Pending Bookings
            'pendingBookings' => Booking::query()->where('status', 'pending')->count(),
        ];
    }
}
