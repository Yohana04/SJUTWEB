<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="w-2 h-8 bg-[#2B579A]"></div>
            <h2 class="font-serif font-black text-2xl text-[#1a3a63] tracking-tight">
                Upload Program Material
            </h2>
        </div>
    </x-slot>

    <div class="p-6">
        <div class="bg-white border border-slate-100 rounded-xl shadow-sm overflow-hidden">
            <form method="POST" action="{{ route('admin.materials.store') }}" enctype="multipart/form-data" class="p-8">
                @csrf
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Program -->
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Program *</label>
                            <select name="program_id" required class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:ring-2 focus:ring-[#2B579A] focus:border-transparent transition-all text-sm">
                                <option value="">Select Program</option>
                                @foreach($programs as $program)
                                    <option value="{{ $program->id }}">{{ $program->name }}</option>
                                @endforeach
                            </select>
                            @error('program_id')
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Title -->
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Material Title *</label>
                            <input type="text" name="title" value="{{ old('title') }}" required 
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
                                      placeholder="Brief description of the material...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- File Upload -->
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">File Upload *</label>
                            <div class="border-2 border-dashed border-slate-200 rounded-lg p-8 text-center hover:border-[#2B579A]/50 transition-colors">
                                <div class="text-4xl mb-4">📁</div>
                                <p class="text-sm text-slate-600 mb-2">Drop your file here or click to browse</p>
                                <p class="text-xs text-slate-400 mb-4">Maximum file size: 10MB</p>
                                <input type="file" name="file" id="file" required class="hidden" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,.zip,.rar,.jpg,.jpeg,.png,.gif">
                                <label for="file" class="inline-flex items-center gap-2 bg-[#2B579A] text-white px-4 py-2 rounded-lg text-xs font-black uppercase tracking-widest cursor-pointer hover:bg-[#1a3a63] transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                    Choose File
                                </label>
                                <div id="file-info" class="mt-4 text-sm text-slate-600"></div>
                            </div>
                            @error('file')
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Supported Formats -->
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Supported Formats</label>
                            <div class="grid grid-cols-3 gap-2 text-xs">
                                <div class="flex items-center gap-1 text-slate-500">
                                    <span>📄</span> PDF
                                </div>
                                <div class="flex items-center gap-1 text-slate-500">
                                    <span>📝</span> DOC/DOCX
                                </div>
                                <div class="flex items-center gap-1 text-slate-500">
                                    <span>📊</span> XLS/XLSX
                                </div>
                                <div class="flex items-center gap-1 text-slate-500">
                                    <span>📽️</span> PPT/PPTX
                                </div>
                                <div class="flex items-center gap-1 text-slate-500">
                                    <span>📋</span> TXT
                                </div>
                                <div class="flex items-center gap-1 text-slate-500">
                                    <span>🗜️</span> ZIP/RAR
                                </div>
                                <div class="flex items-center gap-1 text-slate-500">
                                    <span>🖼️</span> Images
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end gap-4 mt-8 pt-8 border-t border-slate-100">
                    <a href="{{ route('admin.materials.index') }}" class="px-6 py-3 border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition-all text-[10px] font-black uppercase tracking-widest">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-3 bg-[#1a3a63] text-white rounded-lg hover:bg-[#2B579A] transition-all text-[10px] font-black uppercase tracking-widest shadow active:scale-95">
                        Upload Material
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('file').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const fileInfo = document.getElementById('file-info');
            
            if (file) {
                const size = (file.size / 1024 / 1024).toFixed(2);
                fileInfo.innerHTML = `
                    <div class="flex items-center justify-between">
                        <span class="font-medium">${file.name}</span>
                        <span class="text-slate-400">${size} MB</span>
                    </div>
                `;
            } else {
                fileInfo.innerHTML = '';
            }
        });

        // Drag and drop functionality
        const dropZone = document.querySelector('.border-dashed');
        
        dropZone.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.classList.add('border-[#2B579A]', 'bg-slate-50');
        });

        dropZone.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.classList.remove('border-[#2B579A]', 'bg-slate-50');
        });

        dropZone.addEventListener('drop', function(e) {
            e.preventDefault();
            this.classList.remove('border-[#2B579A]', 'bg-slate-50');
            
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                document.getElementById('file').files = files;
                document.getElementById('file').dispatchEvent(new Event('change'));
            }
        });
    </script>
</x-app-layout>
