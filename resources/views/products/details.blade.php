<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-bold mb-8 text-center">{{ $product['title'] }}</h1>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden max-w-4xl mx-auto">
            <img src="{{ $product['image'] }}" alt="{{ $product['title'] }}" class="w-full h-80 object-fill">
            <div class="p-6">
                <h2 class="text-3xl font-semibold text-gray-800 mb-2">{{ $product['title'] }}</h2>
                <p class="text-gray-600 mb-4">{{ $product['description'] }}</p>
                <p class="text-gray-800 text-2xl font-bold mb-2">${{ number_format($product['price'], 2) }}</p>
                <p class="text-gray-500 mb-2">Category: {{ $product['category'] }}</p>
                <div class="flex items-center mb-4">
                    <p class="text-yellow-500 mr-2 flex items-center">
                        @for ($i = 0; $i < floor($product['rating']['rate']); $i++)
                            <i class="fa-solid fa-star"></i>
                        @endfor
                        @if ($product['rating']['rate'] - floor($product['rating']['rate']) > 0)
                            <i class="fa-regular fa-star-half-stroke"></i>
                        @endif
                    </p>
                    <p class="text-gray-500">({{ $product['rating']['count'] }} reviews)</p>
                </div>
                <button class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-300">Add to Cart</button>
            </div>
        </div>
    </div>
</x-app-layout>
