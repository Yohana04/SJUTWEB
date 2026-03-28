<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="w-2 h-8 bg-[#2B579A]"></div>
            <h2 class="font-serif font-black text-2xl text-[#1a3a63] tracking-tight">
                Add Gallery Item
            </h2>
        </div>
    </x-slot>

    <div class="animate-fade-in-up">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white shadow rounded-lg">
                <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
                    @csrf
                    
                    <div class="px-4 py-3 border-b border-gray-200">
                        <h2 class="text-base font-medium text-gray-900">Gallery Item Details</h2>
                    </div>

                    <div class="px-4 space-y-3">
                        <!-- Title -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                                Title <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title') }}"
                                   required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                                   placeholder="Enter gallery item title">
                            @error('title')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                                Description
                            </label>
                            <textarea id="description" 
                                      name="description" 
                                      rows="2"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                                      placeholder="Enter a brief description (optional)">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- File Upload -->
                        <div>
                            <label for="file" class="block text-sm font-medium text-gray-700 mb-1">
                                File <span class="text-red-500">*</span>
                            </label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-3 text-center hover:border-gray-400 transition-colors">
                                <div class="space-y-1">
                                    <svg class="mx-auto h-6 w-6 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="text-xs text-gray-600">
                                        <label for="file" class="cursor-pointer text-blue-600 hover:text-blue-500 font-medium">
                                            Upload a file
                                        </label>
                                        <p class="text-gray-500">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        PNG, JPG, GIF up to 10MB or MP4, MOV, AVI up to 10MB
                                    </p>
                                    <input type="file" 
                                           id="file" 
                                           name="file" 
                                           accept="image/*,video/*"
                                           required
                                           class="hidden">
                                </div>
                            </div>
                            @error('file')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Type and Category Row -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <!-- Type -->
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">
                                    Media Type <span class="text-red-500">*</span>
                                </label>
                                <select id="type" 
                                        name="type" 
                                        required
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                                    <option value="">Select type</option>
                                    <option value="image" {{ old('type') == 'image' ? 'selected' : '' }}>Image</option>
                                    <option value="video" {{ old('type') == 'video' ? 'selected' : '' }}>Video</option>
                                </select>
                                @error('type')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Category -->
                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700 mb-1">
                                    Category <span class="text-red-500">*</span>
                                </label>
                                <select id="category" 
                                        name="category" 
                                        required
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                                    <option value="">Select category</option>
                                    <option value="campus-life" {{ old('category') == 'campus-life' ? 'selected' : '' }}>Campus Life</option>
                                    <option value="events" {{ old('category') == 'events' ? 'selected' : '' }}>Events</option>
                                    <option value="sports" {{ old('category') == 'sports' ? 'selected' : '' }}>Sports</option>
                                    <option value="academic" {{ old('category') == 'academic' ? 'selected' : '' }}>Academic</option>
                                    <option value="general" {{ old('category') == 'general' ? 'selected' : '' }}>General</option>
                                </select>
                                @error('category')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Order and Status Row -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <!-- Order -->
                            <div>
                                <label for="order" class="block text-sm font-medium text-gray-700 mb-1">
                                    Display Order
                                </label>
                                <input type="number" 
                                       id="order" 
                                       name="order" 
                                       value="{{ old('order', 0) }}"
                                       min="0"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                                       placeholder="0 (highest priority)">
                                @error('order')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Status
                                </label>
                                <div class="flex items-center">
                                    <label class="flex items-center">
                                        <input type="checkbox" 
                                               name="is_active" 
                                               value="1"
                                               {{ old('is_active', true) ? 'checked' : '' }}
                                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                        <span class="ml-2 text-sm text-gray-700">Active</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="px-4 py-3 bg-gray-50 border-t border-gray-200 flex justify-end space-x-2">
                        <a href="{{ route('admin.galleries.index') }}" 
                           class="px-3 py-2 border border-gray-300 rounded-md shadow-sm text-xs font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="px-3 py-2 border border-transparent rounded-md shadow-sm text-xs font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Upload Gallery Item
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
