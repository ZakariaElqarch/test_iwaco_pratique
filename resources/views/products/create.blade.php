<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add Product') }}
            </h2>
            <div>
                <a href="{{ route('products.index') }}" class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-2">Back to Products</a>
            </div>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form id="createForm" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                <input type="text" name="title" id="title" autocomplete="title" placeholder="Enter product title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                <input type="number" name="price" id="price" autocomplete="price" placeholder="Enter product price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                                <input type="number" name="quantity" id="quantity" autocomplete="quantity" placeholder="Enter product quantity" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6">
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea id="description" name="description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Enter product description"></textarea>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="image" class="block text-sm font-medium text-gray-700">Image URL</label>
                                <input type="text" name="image" id="image"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-2">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @vite('resources/js/create.js')
</x-app-layout>
