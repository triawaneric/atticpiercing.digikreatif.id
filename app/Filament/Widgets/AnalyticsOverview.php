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

        // Fetch the appointment counts based on 'appointment_date'
        $appointmentCount = Appointment::query()->count();  // Total appointments count
        $appointmentsToday = Appointment::query()->whereDate('appointment_datetime', $today)->count();
        $appointmentsThisWeek = Appointment::query()->whereBetween('appointment_datetime', [$weekStart, now()])->count();
        $appointmentsThisMonth = Appointment::query()->whereBetween('appointment_datetime', [$monthStart, now()])->count();

        $pendingAppointments = Appointment::query()->where('status', 'pending')->count();  // Appointments with 'pending' status

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
