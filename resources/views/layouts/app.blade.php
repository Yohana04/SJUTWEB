<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body class="font-sans antialiased bg-slate-50 text-slate-900">
    <div class="min-h-screen flex overflow-hidden">
        <!-- Sidebar -->
        <aside class="hidden lg:flex lg:flex-shrink-0">
            <div class="flex flex-col w-64 bg-[#1a3a63] border-r border-white/10 shadow-2xl transition-all">
                <!-- Branding -->
                <div class="flex items-center h-16 px-6 bg-[#1a3a63] border-b border-white/5">
                    <span class="text-xl mr-3">🏛️</span>
                    <div class="flex flex-col">
                        <span class="text-[8px] font-black text-white/50 uppercase tracking-[0.2em] leading-none">Management Portal</span>
                        <span class="text-[11px] font-black text-white uppercase tracking-widest mt-0.5">CICT - SJUT</span>
                    </div>
                </div>

                <!-- Nav Links -->
                <nav class="flex-1 px-3 py-6 space-y-1.5 overflow-y-auto">
                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-[10px] font-black uppercase tracking-widest transition-all rounded-sm {{ request()->routeIs('dashboard') ? 'bg-[#FDB913] text-[#1a3a63] shadow-lg' : 'text-white/60 hover:bg-white/5 hover:text-white' }}">
                        <span class="mr-3 opacity-50 text-base">📊</span> Dashboard
                    </a>
                    
                    <div class="pt-6 pb-2">
                        <span class="px-4 text-[8px] font-black text-white/30 uppercase tracking-[0.3em]">Institutional Data</span>
                    </div>
                    
                    <a href="{{ route('admin.news.index') }}" class="flex items-center px-4 py-3 text-[10px] font-black uppercase tracking-widest transition-all rounded-sm {{ request()->routeIs('admin.news.*') ? 'bg-white/10 text-white' : 'text-white/60 hover:bg-white/5 hover:text-white' }}">
                        <span class="mr-3 opacity-50 text-base">📰</span> News & Media
                    </a>
                    
                    <a href="{{ route('admin.galleries.index') }}" class="flex items-center px-4 py-3 text-[10px] font-black uppercase tracking-widest transition-all rounded-sm ml-6 {{ request()->routeIs('admin.galleries.*') ? 'bg-white/10 text-white' : 'text-white/60 hover:bg-white/5 hover:text-white' }}">
                        <span class="mr-3 opacity-50 text-base">📸</span> Gallery
                    </a>
                    
                    <a href="{{ route('admin.announcements.index') }}" class="flex items-center px-4 py-3 text-[10px] font-black uppercase tracking-widest transition-all rounded-sm {{ request()->routeIs('admin.announcements.*') ? 'bg-white/10 text-white' : 'text-white/60 hover:bg-white/5 hover:text-white' }}">
                        <span class="mr-3 opacity-50 text-base">📢</span> Notices
                    </a>

                    <div class="pt-6 pb-2">
                        <span class="px-4 text-[8px] font-black text-white/30 uppercase tracking-[0.3em]">Academic Units</span>
                    </div>

                    <a href="{{ route('admin.departments.index') }}" class="flex items-center px-4 py-3 text-[10px] font-black uppercase tracking-widest transition-all rounded-sm {{ request()->routeIs('admin.departments.*') ? 'bg-white/10 text-white' : 'text-white/60 hover:bg-white/5 hover:text-white' }}">
                        <span class="mr-3 opacity-50 text-base">🏛️</span> Departments
                    </a>

                    <a href="{{ route('admin.programs.index') }}" class="flex items-center px-4 py-3 text-[10px] font-black uppercase tracking-widest transition-all rounded-sm {{ request()->routeIs('admin.programs.*') ? 'bg-white/10 text-white' : 'text-white/60 hover:bg-white/5 hover:text-white' }}">
                        <span class="mr-3 opacity-50 text-base">🎓</span> Programs
                    </a>

                    <a href="{{ route('admin.staff.index') }}" class="flex items-center px-4 py-3 text-[10px] font-black uppercase tracking-widest transition-all rounded-sm {{ request()->routeIs('admin.staff.*') ? 'bg-white/10 text-white' : 'text-white/60 hover:bg-white/5 hover:text-white' }}">
                        <span class="mr-3 opacity-50 text-base">👥</span> Staff Directory
                    </a>

                    <a href="{{ route('admin.projects.index') }}" class="flex items-center px-4 py-3 text-[10px] font-black uppercase tracking-widest transition-all rounded-sm {{ request()->routeIs('admin.projects.*') ? 'bg-white/10 text-white' : 'text-white/60 hover:bg-white/5 hover:text-white' }}">
                        <span class="mr-3 opacity-50 text-base">🧪</span> Research & Projects
                    </a>

                    <div class="pt-6 pb-2">
                        <span class="px-4 text-[8px] font-black text-white/30 uppercase tracking-[0.3em]">System</span>
                    </div>

                    <a href="{{ route('admin.audit.index') }}" class="flex items-center px-4 py-3 text-[10px] font-black uppercase tracking-widest transition-all rounded-sm {{ request()->routeIs('admin.audit.*') ? 'bg-white/10 text-white' : 'text-white/60 hover:bg-white/5 hover:text-white' }}">
                        <span class="mr-3 opacity-50 text-base">📋</span> Audit log
                    </a>
                    
                    <div class="pt-6 pb-2">
                        <span class="px-4 text-[8px] font-black text-white/30 uppercase tracking-[0.3em]">Communication</span>
                    </div>

                    <a href="{{ route('admin.contacts.index') }}" class="flex items-center px-4 py-3 text-[10px] font-black uppercase tracking-widest transition-all rounded-sm {{ request()->routeIs('admin.contacts.*') ? 'bg-white/10 text-white' : 'text-white/60 hover:bg-white/5 hover:text-white' }}">
                        <span class="mr-3 opacity-50 text-base">📩</span> Inquiries
                    </a>
                </nav>

                <!-- Footer / User -->
                <div class="p-5 bg-black/20 border-t border-white/5">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-[#FDB913]/20 flex items-center justify-center text-[#FDB913] font-black text-[10px]">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[10px] font-black text-white uppercase tracking-widest">{{ Auth::user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                @csrf
                                <button type="submit" class="text-[8px] font-black text-white/40 uppercase tracking-widest hover:text-[#FDB913] transition-colors mt-0.5">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top Bar -->
            <header class="h-16 bg-white border-b border-slate-100 flex items-center justify-between px-6 relative z-10 transition-all">
                <div>
                    @isset($header)
                        {{ $header }}
                    @endisset
                </div>
                
                <div class="flex items-center gap-5">
                    <div class="flex items-center gap-2 text-slate-400">
                        <span class="text-[10px] font-black uppercase tracking-widest">{{ date('l, d F Y') }}</span>
                    </div>
                    <div class="h-4 w-px bg-slate-100"></div>
                    <button class="w-8 h-8 flex items-center justify-center text-slate-400 hover:text-[#2B579A] transition-colors relative">
                        <span class="text-sm">🔔</span>
                        <span class="absolute top-1 right-1 w-1.5 h-1.5 bg-red-500 rounded-full border border-white"></span>
                    </button>
                </div>
            </header>

            <!-- Scrollable Content -->
            <main class="flex-1 overflow-y-auto p-10 bg-slate-50 transition-all">
                <div class="max-w-6xl mx-auto">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
    </main>

</body>
    @stack('scripts')
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Flash Messages
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: "{!! addslashes(session('success')) !!}",
                    timer: 3000,
                    showConfirmButton: false
                });
            @endif

            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: "{!! addslashes(session('error')) !!}",
                });
            @endif

            @if(session('warning'))
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning!',
                    text: "{!! addslashes(session('warning')) !!}",
                });
            @endif
            
            // Intercept standard javascript confirms in forms and convert to SweetAlert
            const confirmForms = document.querySelectorAll('form[onsubmit*="return confirm"]');
            confirmForms.forEach(form => {
                const originalOnsubmit = form.getAttribute('onsubmit');
                const match = originalOnsubmit.match(/confirm\(['"](.*?)['"]\)/);
                
                if (match && match[1]) {
                    form.removeAttribute('onsubmit');
                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        Swal.fire({
                            title: 'Are you sure?',
                            text: match[1],
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Yes, proceed!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    });
                }
            });

            // Auto Logout after 3 minutes of inactivity
            let idleTime = 0;
            const idleLimit = 3 * 60; // 3 minutes in seconds
            let isLoggingOut = false;
            
            const idleInterval = setInterval(() => {
                if(isLoggingOut) return;
                idleTime++;
                if (idleTime >= idleLimit) {
                    isLoggingOut = true;
                    clearInterval(idleInterval);
                    
                    Swal.fire({
                        title: 'Session Expired',
                        text: 'You have been automatically logged out due to 3 minutes of inactivity.',
                        icon: 'info',
                        timer: 3000,
                        timerProgressBar: true,
                        showConfirmButton: false,
                        allowOutsideClick: false
                    }).then(() => {
                        document.getElementById('logout-form').submit();
                    });
                }
            }, 1000);

            // Zero the idle timer on user activity
            ['mousemove', 'keydown', 'scroll', 'click', 'touchstart'].forEach(evt => 
                document.addEventListener(evt, () => idleTime = 0, true)
            );
        });
    </script>
</body>
</html>
