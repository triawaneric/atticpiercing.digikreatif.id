<?php

namespace App\Filament\Widgets;


use App\Models\Appointment;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use Saade\FilamentFullCalendar\Data\EventData;
use App\Filament\Resources\AppointmentResource;

class CalendarWidget extends FullCalendarWidget
{
    /**
     * FullCalendar will call this function whenever it needs new event data.
     * This is triggered when the user clicks prev/next or switches views on the calendar.
     */
    public function fetchEvents(array $fetchInfo): array
    {
        return Appointment::query()
            ->where('appointment_datetime', '>=', $fetchInfo['start'])
            ->where('appointment_datetime', '<=', $fetchInfo['end'])
            ->get()
            ->map(
                fn (Appointment $appointment) => EventData::make()
                    ->id($appointment->id) // Use the appointment ID
                    ->title($appointment->name) // Use the appointment's name
                    ->start($appointment->appointment_datetime) // Use the appointment's datetime
                    ->end($appointment->appointment_datetime) // Assume the appointment is 1-hour long; adjust if needed
                    ->url(
                        url: AppointmentResource::getUrl(name: 'view', parameters: ['record' => $appointment->id]),
                        shouldOpenUrlInNewTab: false
                    )
            )
            ->toArray();
    }
}
