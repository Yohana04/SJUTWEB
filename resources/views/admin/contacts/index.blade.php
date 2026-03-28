<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="w-2 h-8 bg-[#2B579A]"></div>
            <h2 class="font-serif font-black text-2xl text-[#1a3a63] tracking-tight">
                {{ __('Inquiry Management') }}
            </h2>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 shadow-sm animate-fade-in" role="alert">
            <p class="text-[10px] font-black uppercase tracking-widest">{{ session('success') }}</p>
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 shadow-sm" role="alert">
            <p class="text-[10px] font-black uppercase tracking-widest">{{ $errors->first() }}</p>
        </div>
    @endif

    <div class="bg-white border border-slate-100 shadow-sm overflow-hidden animate-fade-in-up">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-100">
                    <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">Sender</th>
                    <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">Subject / Message</th>
                    <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">Status</th>
                    <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse($contacts as $contact)
                <tr class="hover:bg-slate-50/50 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="text-xs font-bold text-slate-700 leading-tight">{{ $contact->name }}</div>
                        <div class="text-[8px] font-black text-slate-400 mt-0.5 uppercase tracking-widest">{{ $contact->email }}</div>
                        @if($contact->phone)
                            <div class="text-[8px] font-black text-slate-300 mt-0.5">{{ $contact->phone }}</div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-[10px] font-bold text-slate-600 uppercase tracking-tight">{{ $contact->subject ?? '—' }}</div>
                        <div class="text-[10px] text-slate-400 mt-0.5 line-clamp-2 max-w-sm">{{ $contact->message }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('admin.contacts.update', $contact) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="status" onchange="this.form.submit()" class="text-[8px] font-black uppercase tracking-[0.1em] border-none bg-slate-100 rounded-full px-2.5 py-1 cursor-pointer outline-none focus:ring-0
                                @if($contact->status == 'new') text-blue-600 @elseif($contact->status == 'read') text-slate-500 @else text-green-600 @endif">
                                <option value="new" {{ $contact->status == 'new' ? 'selected' : '' }}>NEW</option>
                                <option value="read" {{ $contact->status == 'read' ? 'selected' : '' }}>READ</option>
                                <option value="replied" {{ $contact->status == 'replied' ? 'selected' : '' }}>REPLIED</option>
                            </select>
                        </form>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-1.5">
                            {{-- View Message Button --}}
                            <button onclick="openViewModal({{ $contact->id }})" title="View Full Message"
                                    class="p-1.5 bg-green-50 text-green-500 hover:bg-green-600 hover:text-white rounded-sm transition-all">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                            {{-- Reply Button --}}
                            <button onclick="openReplyModal({{ $contact->id }})" title="Send Reply"
                                    class="p-1.5 bg-blue-50 text-blue-500 hover:bg-[#2B579A] hover:text-white rounded-sm transition-all">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </button>
                            {{-- Delete Button --}}
                            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Archive this message permanently?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Archive Message"
                                        class="p-1.5 bg-slate-100 text-slate-400 hover:bg-red-50 hover:text-red-600 rounded-sm transition-all">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>

                {{-- Reply Modal for this contact --}}
                <div id="reply-modal-{{ $contact->id }}"
                     class="hidden fixed inset-0 z-50 flex items-center justify-center p-4"
                     onclick="if(event.target===this) closeReplyModal({{ $contact->id }})">
                    {{-- Backdrop --}}
                    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>
                    {{-- Modal Card --}}
                    <div class="relative bg-white w-full max-w-md rounded-2xl shadow-2xl overflow-hidden animate-fade-in-up">
                        {{-- Header --}}
                        <div class="bg-gradient-to-r from-[#2B579A] to-[#1a3a63] px-6 py-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <div class="w-1.5 h-6 bg-[#FDB913]"></div>
                                    <div>
                                        <div class="text-[7px] font-black text-white/60 uppercase tracking-[0.2em]">Compose Reply</div>
                                        <div class="text-sm font-serif font-black text-white">{{ $contact->name }}</div>
                                        <div class="text-[8px] font-black text-[#FDB913] uppercase tracking-widest">{{ $contact->email }}</div>
                                    </div>
                                </div>
                                <button onclick="closeReplyModal({{ $contact->id }})"
                                        class="w-8 h-8 flex items-center justify-center text-white/60 hover:text-white hover:bg-white/10 rounded-lg transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                                </button>
                            </div>
                        </div>
                        <div class="h-0.5 bg-gradient-to-r from-[#FDB913] to-[#FDB913]/50"></div>

                        {{-- Original Message Preview --}}
                        <div class="px-6 pt-4 pb-3 bg-slate-50">
                            <div class="text-[7px] font-black text-slate-400 uppercase tracking-widest mb-2">Original Inquiry</div>
                            <div class="bg-white border border-slate-200 rounded-lg p-3 shadow-sm">
                                <div class="font-black text-slate-700 block mb-1 text-[8px] uppercase tracking-wide">{{ $contact->subject ?? 'No subject' }}</div>
                                <div class="text-xs text-slate-600 leading-relaxed line-clamp-2">{{ $contact->message }}</div>
                                <div class="text-[7px] text-slate-400 mt-2 uppercase tracking-widest">
                                    {{ $contact->created_at->format('M j, Y \a\t g:i A') }}
                                </div>
                            </div>
                        </div>

                        {{-- Reply Form --}}
                        <form action="{{ route('admin.contacts.reply', $contact) }}" method="POST" class="px-6 pb-6 pt-4 bg-white">
                            @csrf
                            <div class="mb-3">
                                <label class="block text-[7px] font-black text-slate-400 uppercase tracking-widest mb-2">
                                    Your Reply
                                </label>
                                <textarea name="reply_message" rows="4" required minlength="10"
                                          placeholder="Type your reply to {{ $contact->name }}..."
                                          class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs text-slate-700 focus:ring-2 focus:ring-[#2B579A] focus:border-transparent outline-none resize-none leading-relaxed transition-all"></textarea>
                            </div>
                            
                            <div class="flex items-center justify-between">
                                <div class="flex gap-2">
                                    <button type="button" onclick="closeReplyModal({{ $contact->id }})"
                                            class="px-4 py-2 text-[8px] font-black text-white uppercase tracking-widest transition-colors rounded-lg bg-[#2B579A] hover:bg-[#1a3a63]">
                                        Cancel
                                    </button>
                                </div>
                                <div class="flex gap-2">
                                    <button type="submit"
                                            class="inline-flex items-center gap-1.5 bg-[#2B579A] text-white px-6 py-2 rounded-lg text-[8px] font-black uppercase tracking-widest hover:bg-[#1a3a63] transition-all shadow hover:shadow-lg transform hover:scale-105">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                                        Send Reply
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- View Message Modal for this contact --}}
                <div id="view-modal-{{ $contact->id }}"
                     class="hidden fixed inset-0 z-50 flex items-center justify-center p-4"
                     onclick="if(event.target===this) closeViewModal({{ $contact->id }})">
                    {{-- Backdrop --}}
                    <div class="absolute inset-0 bg-[#1a3a63]/70 backdrop-blur-sm"></div>
                    {{-- Modal Card --}}
                    <div class="relative bg-white w-full max-w-2xl rounded-2xl shadow-2xl overflow-hidden animate-fade-in-up">
                        {{-- Header --}}
                        <div class="bg-gradient-to-r from-green-600 to-green-700 px-8 py-5 flex items-center justify-between">
                            <div>
                                <div class="text-[8px] font-black text-white/40 uppercase tracking-[0.2em]">Message Details</div>
                                <div class="text-sm font-black text-white mt-0.5">{{ $contact->name }}</div>
                                <div class="text-[9px] font-black text-[#FDB913] uppercase tracking-widest">{{ $contact->email }}</div>
                                @if($contact->phone)
                                    <div class="text-[9px] font-black text-white/80 mt-1">{{ $contact->phone }}</div>
                                @endif
                            </div>
                            <button onclick="closeViewModal({{ $contact->id }})"
                                    class="w-8 h-8 flex items-center justify-center text-white/40 hover:text-white hover:bg-white/10 rounded-lg transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                        <div class="h-1 bg-[#FDB913]"></div>

                        {{-- Message Content --}}
                        <div class="px-8 py-6">
                            <div class="mb-4">
                                <div class="text-[8px] font-black text-slate-400 uppercase tracking-widest mb-2">Subject</div>
                                <div class="text-sm font-bold text-slate-700 bg-slate-50 px-4 py-2 rounded-lg">
                                    {{ $contact->subject ?? 'No subject' }}
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <div class="text-[8px] font-black text-slate-400 uppercase tracking-widest mb-2">Message</div>
                                <div class="bg-slate-50 border-l-4 border-green-500 px-4 py-4 rounded text-sm text-slate-600 leading-relaxed">
                                    {{ $contact->message }}
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="text-[8px] font-black text-slate-400 uppercase tracking-widest mb-2">Received</div>
                                <div class="text-xs text-slate-500">
                                    {{ $contact->created_at->format('l, F j, Y \a\t g:i A') }}
                                </div>
                            </div>
                        </div>

                        {{-- Footer Actions --}}
                        <div class="bg-slate-50 px-8 py-4 flex justify-between items-center border-t">
                            <div class="flex gap-2">
                                <button onclick="closeViewModal({{ $contact->id }})"
                                        class="px-4 py-2 text-[9px] font-black text-slate-600 uppercase tracking-widest hover:text-slate-800 transition-colors">
                                    Close
                                </button>
                            </div>
                            <div class="flex gap-2">
                                <button onclick="closeViewModal({{ $contact->id }}); openReplyModal({{ $contact->id }})"
                                        class="px-4 py-2 bg-[#2B579A] text-white text-[9px] font-black uppercase tracking-widest rounded-lg hover:bg-[#1a3a63] transition-all">
                                    Reply
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                @empty
                <tr>
                    <td colspan="4" class="px-8 py-20 text-center">
                        <div class="text-4xl mb-4">📩</div>
                        <div class="text-xs font-black text-slate-300 uppercase tracking-[0.2em]">No inquiries found.</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @push('scripts')
    <script>
        function openReplyModal(id) {
            document.getElementById('reply-modal-' + id).classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        function closeReplyModal(id) {
            document.getElementById('reply-modal-' + id).classList.add('hidden');
            document.body.style.overflow = '';
        }
        
        function openViewModal(id) {
            document.getElementById('view-modal-' + id).classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        function closeViewModal(id) {
            document.getElementById('view-modal-' + id).classList.add('hidden');
            document.body.style.overflow = '';
        }
    </script>
@endpush
</x-app-layout>
