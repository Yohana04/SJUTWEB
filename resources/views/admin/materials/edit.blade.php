<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="w-2 h-8 bg-[#2B579A]"></div>
            <h2 class="font-serif font-black text-2xl text-[#1a3a63] tracking-tight">
                Edit Program Material
            </h2>
        </div>
    </x-slot>

    <div class="p-6">
        <div class="bg-white border border-slate-100 rounded-xl shadow-sm overflow-hidden">
            <form method="POST" action="{{ route('admin.materials.update', $material) }}" class="p-8">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Program -->
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Program *</label>
                            <select name="program_id" required class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:ring-2 focus:ring-[#2B579A] focus:border-transparent transition-all text-sm">
                                <option value="">Select Program</option>
                                @foreach($programs as $program)
                                    <option value="{{ $program->id }}" {{ $material->program_id == $program->id ? 'selected' : '' }}>{{ $program->name }}</option>
                                @endforeach
                            </select>
                            @error('program_id')
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Title -->
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Material Title *</label>
                            <input type="text" name="title" value="{{ $material->title }}" required 
                                   class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:ring-2 focus:ring-[#2B579A] focus:border-transparent transition-all text-sm"
                                   placeholder="e.g., Course Notes - Chapter 1">
                            @error('title')
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Description</label>
                            <textarea name="description" rows="4" 
                                      class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:ring-2 focus:ring-[#2B579A] focus:border-transparent transition-all text-sm"
                                      placeholder="Brief description of the material...">{{ old('description', $material->description) }}</textarea>
                            @error('description')
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Current File Info -->
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Current File</label>
                            <div class="border border-slate-200 rounded-lg p-6 bg-slate-50">
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="text-3xl">{{ $material->file_icon }}</div>
                                    <div>
                                        <h4 class="font-bold text-[#1a3a63]">{{ $material->file_name }}</h4>
                                        <div class="flex items-center gap-4 text-xs text-slate-400">
                                            <span>{{ $material->file_type }}</span>
                                            <span>•</span>
                                            <span>{{ $material->file_size_formatted }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs text-slate-500">
                                    <p><strong>Note:</strong> To replace the file, you would need to delete this material and upload a new one.</p>
                                </div>
                            </div>
                        </div>

                        <!-- File Details -->
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">File Details</label>
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div>
                                    <p class="text-slate-400 text-xs">Uploaded</p>
                                    <p class="font-medium">{{ $material->created_at->format('M d, Y H:i') }}</p>
                                </div>
                                <div>
                                    <p class="text-slate-400 text-xs">Status</p>
                                    <p class="font-medium">
                                        @if($material->is_active)
                                            <span class="text-green-600">Active</span>
                                        @else
                                            <span class="text-red-600">Inactive</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Active Status -->
                        <div>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" value="1" {{ $material->is_active ? 'checked' : '' }} class="mr-3">
                                <div>
                                    <div class="text-sm font-medium text-slate-700">Material is Active</div>
                                    <div class="text-xs text-slate-400">Inactive materials won't be shown to students</div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end gap-4 mt-8 pt-8 border-t border-slate-100">
                    <a href="{{ route('admin.materials.index') }}" class="px-6 py-3 border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition-all text-[10px] font-black uppercase tracking-widest">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-3 bg-[#1a3a63] text-white rounded-lg hover:bg-[#2B579A] transition-all text-[10px] font-black uppercase tracking-widest shadow active:scale-95">
                        Update Material
                    </button>
                </div>
            </form>
        </div>

        <!-- Danger Zone -->
        <div class="mt-8 bg-red-50 border border-red-100 rounded-xl p-6">
            <h3 class="text-lg font-bold text-red-800 mb-4">Danger Zone</h3>
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-red-700 font-medium">Delete this material permanently</p>
                    <p class="text-xs text-red-600">This action cannot be undone and will remove the file from storage.</p>
                </div>
                <form method="POST" action="{{ route('admin.materials.destroy', $material) }}" onsubmit="return confirm('Are you sure you want to delete this material? This cannot be undone.')" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white text-xs font-black uppercase tracking-widest rounded hover:bg-red-700 transition-colors">
                        Delete Material
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
