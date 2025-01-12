<div class="container mx-auto p-6">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Your Cart</h2>

    @if (count($cart) > 0)
        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Product</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Price</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Quantity</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Total</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Action</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach($cart as $productId => $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $item['name'] }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">${{ number_format($item['price'], 2) }}</td>
                        <td class="px-6 py-4 text-sm">
                            <input type="number" wire:model="cart.{{ $productId }}.quantity" min="1" class="w-20 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" wire:change="updateQuantity('{{ $productId }}', $event.target.value)">
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                        <td class="px-6 py-4 text-sm">
                            <button wire:click="removeFromCart('{{ $productId }}')" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition-colors duration-200">Remove</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="flex justify-between items-center mt-6 px-6 py-4 bg-gray-50 rounded-b-lg">
                <h3 class="text-lg font-semibold text-gray-800">Total: ${{ number_format($this->getTotalPrice(), 2) }}</h3>
                <button class="bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-600 transition-colors duration-200">Proceed to Checkout</button>
            </div>
        </div>
    @else
        <p class="text-gray-600 text-lg mt-6">Your cart is empty.</p>
    @endif
</div>
