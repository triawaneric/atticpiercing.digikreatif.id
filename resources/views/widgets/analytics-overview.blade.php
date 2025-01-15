<div class="grid grid-cols-1 gap-4 md:grid-cols-3">
    <!-- Total Bookings -->
    <div class="p-4 bg-white rounded-lg shadow">
        <h3 class="text-lg font-semibold">Total Bookings</h3>
        <p class="mt-2 text-2xl font-bold text-gray-700">{{ $totalBookings }}</p>
    </div>

    <!-- Booking Analytics -->
    <div class="p-4 bg-white rounded-lg shadow">
        <h3 class="text-lg font-semibold">Booking Analytics</h3>
        <ul class="mt-2 space-y-1 text-gray-700">
            <li>Today: <span class="font-bold">{{ $bookingsToday }}</span></li>
            <li>This Week: <span class="font-bold">{{ $bookingsThisWeek }}</span></li>
            <li>This Month: <span class="font-bold">{{ $bookingsThisMonth }}</span></li>
        </ul>
    </div>

    <!-- Pending Approvals -->
    <div class="p-4 bg-white rounded-lg shadow">
        <h3 class="text-lg font-semibold">Bookings Pending Approval</h3>
        <ul class="mt-2 space-y-1 text-gray-700">
            @foreach ($pendingBookings as $booking)
                <li>{{ $booking->id }} - {{ $booking->customer_name }} ({{ $booking->created_at->format('d M Y, H:i') }})</li>
            @endforeach
        </ul>
    </div>
</div>
