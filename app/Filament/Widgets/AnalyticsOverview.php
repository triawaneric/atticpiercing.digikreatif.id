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

        // Fetch the booking counts
        $bookingCount = Booking::query()->count();
        $bookingsToday = Booking::query()->whereDate('created_at', $today)->count();
        $bookingsThisWeek = Booking::query()->whereBetween('created_at', [$weekStart, now()])->count();
        $bookingsThisMonth = Booking::query()->whereBetween('created_at', [$monthStart, now()])->count();
        $pendingBookings = Booking::query()->where('status', 'pending')->count(); // assuming you have a 'status' column

        return [
            'bookingCount' => $bookingCount,
            'bookingsToday' => $bookingsToday,
            'bookingsThisWeek' => $bookingsThisWeek,
            'bookingsThisMonth' => $bookingsThisMonth,
            'pendingBookings' => $pendingBookings,
        ];
    }
}
