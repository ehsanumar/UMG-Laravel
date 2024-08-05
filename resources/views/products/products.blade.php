<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-bold mb-8 text-center">Product List</h1>

        @if($paginatedItems->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($paginatedItems as $product)
                 <a href="{{ route('product.details', ['id' => $product['id']]) }}">
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105">
                        <img src="{{ $product['image'] }}" alt="{{ $product['title'] }}" class="w-full h-60 object-fill">
                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-gray-800">{{ $product['title'] }}</h2>
                            <p class="text-gray-600 mt-2 truncate">{{ $product['description'] }}</p>
                            <p class="text-gray-800 font-bold mt-2">${{ number_format($product['price'], 2) }}</p>
                            <p class="text-gray-500 mt-1">Category: {{ $product['category'] }}</p>
                            <div class="flex items-center mt-2">
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
                            <button class="mt-4 w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-300">Add to Cart</button>
                        </div>
                    </div>
                    </a>
                @endforeach
            </div>

            <!-- Pagination Links -->
            <div class="mt-6">
                {{ $paginatedItems->links('pagination::tailwind') }}
            </div>
        @else
            <p class="text-red-600 text-center mt-8">No products found.</p>
        @endif
    </div>
</x-app-layout>
