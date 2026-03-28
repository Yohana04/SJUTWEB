<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="w-2 h-8 bg-[#2B579A]"></div>
            <h2 class="font-serif font-black text-2xl text-[#1a3a63] tracking-tight">
                Material Details
            </h2>
        </div>
    </x-slot>

    <div class="p-6">
        <div class="bg-white border border-slate-100 rounded-xl shadow-sm overflow-hidden">
            <!-- Material Header -->
            <div class="bg-gradient-to-r from-[#1a3a63] to-[#2B579A] p-8 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-serif font-black mb-2">{{ $material->title }}</h1>
                        <div class="flex items-center gap-4 text-white/80 text-sm">
                            <span>{{ $material->program->name }}</span>
                            <span>•</span>
                            <span>{{ $material->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                    <div class="text-5xl">{{ $material->file_icon }}</div>
                </div>
            </div>

            <!-- Material Details -->
            <div class="p-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Left Column - File Info -->
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-bold text-[#1a3a63] mb-4">File Information</h3>
                            <div class="space-y-4">
                                <div class="flex justify-between py-2 border-b border-slate-100">
                                    <span class="text-slate-400 text-sm">File Name</span>
                                    <span class="font-medium text-sm">{{ $material->file_name }}</span>
                                </div>
                                <div class="flex justify-between py-2 border-b border-slate-100">
                                    <span class="text-slate-400 text-sm">File Type</span>
                                    <span class="font-medium text-sm">{{ $material->file_type }}</span>
                                </div>
                                <div class="flex justify-between py-2 border-b border-slate-100">
                                    <span class="text-slate-400 text-sm">File Size</span>
                                    <span class="font-medium text-sm">{{ $material->file_size_formatted }}</span>
                                </div>
                                <div class="flex justify-between py-2 border-b border-slate-100">
                                    <span class="text-slate-400 text-sm">Status</span>
                                    <span class="font-medium text-sm">
                                        @if($material->is_active)
                                            <span class="text-green-600">Active</span>
                                        @else
                                            <span class="text-red-600">Inactive</span>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-[#1a3a63] mb-4">Actions</h3>
                            <div class="space-y-3">
                                <a href="{{ url('storage/' . $material->file_path) }}" download="{{ $material->file_name }}" 
                                   class="w-full flex items-center justify-center gap-2 bg-[#2B579A] text-white px-4 py-3 rounded-lg hover:bg-[#1a3a63] transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    Download File
                                </a>
                                <a href="{{ route('admin.materials.edit', $material) }}" 
                                   class="w-full flex items-center justify-center gap-2 border border-slate-200 text-slate-600 px-4 py-3 rounded-lg hover:bg-slate-50 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    Edit Material
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Description & Metadata -->
                    <div class="lg:col-span-2 space-y-6">
                        <div>
                            <h3 class="text-lg font-bold text-[#1a3a63] mb-4">Description</h3>
                            @if($material->description)
                                <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed">
                                    <p>{{ $material->description }}</p>
                                </div>
                            @else
                                <div class="text-slate-400 italic">No description provided.</div>
                            @endif
                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-[#1a3a63] mb-4">Program Information</h3>
                            <div class="bg-slate-50 border border-slate-100 rounded-lg p-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-[#2B579A] text-white rounded-lg flex items-center justify-center font-black text-lg">
                                        {{ substr($material->program->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-[#1a3a63]">{{ $material->program->name }}</h4>
                                        <div class="flex items-center gap-4 text-xs text-slate-400 mt-1">
                                            <span>{{ $material->program->level }}</span>
                                            <span>•</span>
                                            <span>{{ $material->program->duration_years }} Years</span>
                                            <span>•</span>
                                            <span>{{ $material->program->code }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-[#1a3a63] mb-4">Upload Information</h3>
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div class="bg-slate-50 border border-slate-100 rounded-lg p-4">
                                    <p class="text-slate-400 text-xs mb-1">Uploaded On</p>
                                    <p class="font-medium">{{ $material->created_at->format('M d, Y H:i') }}</p>
                                </div>
                                <div class="bg-slate-50 border border-slate-100 rounded-lg p-4">
                                    <p class="text-slate-400 text-xs mb-1">Last Updated</p>
                                    <p class="font-medium">{{ $material->updated_at->format('M d, Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="mt-6 flex items-center justify-between">
            <a href="{{ route('admin.materials.index') }}" class="flex items-center gap-2 text-slate-600 hover:text-[#2B579A] transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                Back to Materials
            </a>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.materials.edit', $material) }}" class="px-4 py-2 bg-[#2B579A] text-white text-xs font-black uppercase tracking-widest rounded hover:bg-[#1a3a63] transition-colors">
                    Edit Material
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
