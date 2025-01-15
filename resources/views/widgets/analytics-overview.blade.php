<div class="grid grid-cols-1 gap-4 md:grid-cols-3">
    <!-- Booking Count -->
    <div class="p-4 bg-white rounded-lg shadow">
        <h3 class="text-lg font-semibold">Total Bookings</h3>
        <p class="mt-2 text-2xl font-bold text-gray-700">70</p>
    </div>

    <!-- Order Analytics -->
    <div class="p-4 bg-white rounded-lg shadow">
        <h3 class="text-lg font-semibold">E-commerce Orders</h3>
        <ul class="mt-2 space-y-1 text-gray-700">
            <li>Today: <span class="font-bold">576</span></li>
            <li>This Week: <span class="font-bold">5666</span></li>
            <li>This Month: <span class="font-bold">66666</span></li>
        </ul>
    </div>

    <!-- Recent Orders -->
    <div class="p-4 bg-white rounded-lg shadow">
        <h3 class="text-lg font-semibold">Recent Orders</h3>
        <ul class="mt-2 space-y-1 text-gray-700">
{{--            @foreach ($recentOrders as $order)--}}
{{--                <li>{{ $order->id }} - {{ $order->customer_name }} ({{ $order->created_at->format('d M Y, H:i') }})</li>--}}
{{--            @endforeach--}}
        </ul>
    </div>
</div>
