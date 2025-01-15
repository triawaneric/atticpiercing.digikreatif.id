<?php

namespace App\Filament\Widgets;

use App\Models\Appointment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class AnalyticsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        // Get the start of today, this week, and this month
        $today = Carbon::today();
        $weekStart = Carbon::now()->startOfWeek();
        $monthStart = Carbon::now()->startOfMonth();

        // Format appointment_datetime to standard format for comparison (Y-m-d H:i:s)
        $todayFormatted = $today->format('Y-m-d H:i:s');
        $weekStartFormatted = $weekStart->format('Y-m-d H:i:s');
        $weekEndFormatted = $weekStart->endOfWeek()->format('Y-m-d H:i:s');
        $monthStartFormatted = $monthStart->format('Y-m-d H:i:s');
        $monthEndFormatted = $monthStart->endOfMonth()->format('Y-m-d H:i:s');

        // Debugging: check the formatted date and time range
//        dd($weekStartFormatted, $weekEndFormatted);

        // Fetch the appointment counts based on 'appointment_datetime'
        $appointmentCount = Appointment::query()->count();  // Total appointments count
        $appointmentsToday = Appointment::query()
            ->whereDate('appointment_datetime', $todayFormatted)  // Compare with formatted today
            ->count();

        // Adjust the query for appointments within this week and this month, including the correct time range
        $appointmentsThisWeek = Appointment::query()
            ->whereBetween('appointment_datetime', [
                $weekStartFormatted,  // Start of the week (formatted)
                $weekEndFormatted     // End of the week (formatted)
            ])->count();

        $appointmentsThisMonth = Appointment::query()
            ->whereBetween('appointment_datetime', [
                $monthStartFormatted, // Start of the month (formatted)
                $monthEndFormatted    // End of the month (formatted)
            ])->count();

        $pendingAppointments = Appointment::query()->where('status', 'pending')->count();

        // Return data as cards with icons
        return [
            Stat::make('Total Appointments', $appointmentCount)
                ->icon('heroicon-o-calendar'), // Icon for total appointments (Outline)
            Stat::make('Appointments Today', $appointmentsToday)
                ->icon('heroicon-o-check-circle'), // Icon for today's appointments (Outline)
            Stat::make('Appointments This Week', $appointmentsThisWeek)
                ->icon('heroicon-o-clock'), // Icon for this week's appointments (Outline)
            Stat::make('Appointments This Month', $appointmentsThisMonth)
                ->icon('heroicon-o-calendar-days'), // Icon for this month's appointments (Outline)
            Stat::make('Pending Appointments', $pendingAppointments)
                ->icon('heroicon-o-exclamation-circle'), // Icon for pending appointments (Outline)
        ];
    }
}
