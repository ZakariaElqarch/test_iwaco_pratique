<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center	">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Product') }}
            </h2>
            <div>
                <a href="{{ route('products.index') }}" class="text-gray-500 hover:text-gray-700">Back to Products</a>

            </div>


        </div>
    </x-slot>
    <div id="toastContainer" class="fixed top-0 right-0 p-4"></div>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
        class="max-w-md mx-auto p-6 bg-white dark:bg-white-900 rounded-lg shadow-md mt-10" id="updateForm">
        @csrf <meta name="_token" content="{{ csrf_token() }}">

        @method('PUT')
    
        <!-- Title -->
        <div class="mb-4">
            <label for="title" class="block font-semibold">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $product->title) }}" required
                class="form-input mt-1 block w-full rounded">
            @error('title')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
    
        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block font-semibold">Description:</label>
            <textarea id="description" name="description" rows="4" 
                class="form-textarea mt-1 block w-full rounded">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
    
        <!-- Price -->
        <div class="mb-4">
            <label for="price" class="block font-semibold">Price:</label>
            <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" required
                class="form-input mt-1 block w-full rounded">
            @error('price')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
    
        <!-- Image -->
        <div class="mb-4">
            <label for="image" class="block font-semibold">Image:</label>
            <input type="file" id="image" name="image" class="form-input mt-1 block w-full rounded">
            @error('image')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
    
        <!-- Quantity -->
        <div class="mb-4">
            <label for="quantity" class="block font-semibold">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}"
                required class="form-input mt-1 block w-full rounded">
            @error('quantity')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
    
        <!-- Submit Button -->
        <div class="flex justify-center">
            <button type="submit" class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-2"
                id="submitButton">
                Update
            </button>
        </div>
    </form>
    @vite('resources/js/edit.js')
 
</x-app-layout>
