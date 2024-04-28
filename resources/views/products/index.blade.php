<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center	">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Products') }}
            </h2>
            <div>
                <button class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-2">
                    <a href="{{ route('products.create') }}">Add product</a>
                </button>
                <button class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-2">
                    <a href="{{ route('shopify.import') }}">Import from shopify</a>
                </button>

            </div>


        </div>
    </x-slot>
    <div class="p-8">
        <div class="grid grid-cols-3 gap-4">
            @foreach ($products as $product)
            <div class="border rounded-lg p-4 flex flex-col items-center bg-white">
                <a href="{{ route('products.show', $product->id) }}">
                    <div class="flex items-center justify-center mb-8"> <!-- Added flex properties to center the image -->
                        <img src="{{ $product->image }}" alt="{{ $product->title }}" class="mt-2 w-32"> <!-- Removed self-center class -->
                    </div>
                    
                    <h2 class="text-lg font-semibold mb-4">{{ $product->title }}</h2>
                    <p class="text-gray-600 mb-7">{{ $product->description }}</p>
                    <p class="text-gray-900 font-bold mb-4">Prix: {{ $product->price }} Dhs</p>
                    <p class="text-gray-700 mt-2 mb-4">Quantity: {{ $product->quantity }}</p>
                </a>
                <button class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-2">
                    <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                </button>
            </div>
            
            @endforeach
        </div>
    </div>

</x-app-layout>
