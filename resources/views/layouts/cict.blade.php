<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CICT - St John\'s University of Tanzania') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/css/design-system.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-slate-900 bg-slate-50">
        <div class="min-h-screen flex flex-col">
            <!-- Top Utility Bar -->
            <div class="header-utility-bar py-2 text-[11px] font-bold uppercase tracking-widest hidden md:block">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    <div class="flex items-center space-x-6">
                        <a href="{{ route('students') }}" class="hover:text-white/70 transition-colors">Students</a>
                        <a href="{{ route('staff.index') }}" class="hover:text-white/70 transition-colors">Staff</a>
                        <a href="{{ route('alumni') }}" class="hover:text-white/70 transition-colors">Alumni</a>
                        <a href="{{ route('visitors') }}" class="hover:text-white/70 transition-colors">Visitors</a>
                    </div>
                    <div class="flex items-center space-x-6">
                        <a href="{{ route('news.index') }}" class="hover:text-white/70 transition-colors">Events</a>
                        <a href="{{ route('contact.create') }}" class="hover:text-white/70 transition-colors">Contact Us</a>
                        <div class="h-3 w-px bg-white/20"></div>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="flex items-center gap-2 bg-[#FDB913] text-[#1a3a63] px-3 py-1 hover:bg-white transition-all">
                                <span>👤</span> Admin Console
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="hover:text-[#FDB913] transition-colors flex items-center gap-2">
                                <span>🔑</span> Login
                            </a>
                        @endauth
                        <div class="h-3 w-px bg-white/20"></div>
                        <div class="relative group">
                            <button class="hover:text-[#FDB913] transition-colors flex items-center gap-1">
                                <span>🔔</span>
                                @if(isset($globalNewCount) && $globalNewCount > 0)
                                    <span class="absolute -top-1 -right-1 flex h-3 w-3">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500 text-[7px] items-center justify-center text-white font-black">{{ $globalNewCount }}</span>
                                    </span>
                                @endif
                            </button>
                            
                            <!-- Simple Dropdown Placeholder -->
                            <div class="absolute right-0 mt-2 w-64 bg-white shadow-2xl border border-slate-100 hidden group-hover:block z-[100] p-4">
                                <h4 class="text-[9px] font-black text-[#1a3a63] uppercase tracking-widest border-b border-slate-50 pb-2 mb-3">Registry Alerts</h4>
                                @if(isset($globalNewCount) && $globalNewCount > 0)
                                    <p class="text-[10px] text-slate-500 font-medium leading-relaxed">
                                        There are <span class="text-[#2B579A] font-bold">{{ $globalNewCount }}</span> new updates in the official registry from the last 48 hours.
                                    </p>
                                    <div class="mt-4 flex flex-col gap-2">
                                        <a href="{{ route('announcements.index') }}" class="text-[8px] font-black uppercase text-[#2B579A] hover:text-[#1a3a63]">→ View Announcements</a>
                                        <a href="{{ route('news.index') }}" class="text-[8px] font-black uppercase text-[#2B579A] hover:text-[#1a3a63]">→ Read News Flash</a>
                                    </div>
                                @else
                                    <p class="text-[10px] text-slate-400 italic">No new registry updates.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Branding Area -->
            <div class="bg-white py-6 border-b border-slate-100">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between gap-8">
                        <!-- Left Logo -->
                        <div class="shrink-0">
                            <span class="text-5xl"></span> {{-- Placeholder for UDSM Logo --}}
                        </div>

                        <!-- Centered Branding -->
                        <div class="flex flex-col items-center text-center flex-grow">
                            <span class="text-[12px] md:text-[14px] font-bold text-slate-500 uppercase tracking-[0.4em] leading-none mb-3">St. John's University of Tanzania</span>
                            <h1 class="text-2xl md:text-3xl font-serif font-black text-[#2B579A] leading-tight tracking-tight">Centre for Information and Communication Technology</h1>
                        </div>

                        <!-- Right Logo -->
                        <div class="shrink-0">
                            <span class="text-5xl"></span> {{-- Placeholder for CICT Logo --}}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Navigation -->
            <nav class="main-nav-bar sticky top-0 z-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-center items-center h-14">
                        <!-- Desktop Nav -->
                        <div class="hidden lg:flex items-center space-x-2">
                            @php
                                $navItems = [
                                    ['name' => 'Home', 'route' => 'home'],
                                    ['name' => 'About', 'route' => 'about'],
                                    ['name' => 'Departments', 'route' => 'departments.index'],
                                    ['name' => 'Programs', 'route' => 'programs.index'],
                                    ['name' => 'Staff', 'route' => 'staff.index'],
                                    ['name' => 'Academic', 'route' => 'academic'],
                                    ['name' => 'News', 'route' => 'news.index'],
                                    ['name' => 'Announcements', 'route' => 'announcements.index'],
                                ];
                            @endphp
                            @foreach($navItems as $item)
                                <a href="{{ route($item['route']) }}" 
                                   class="px-5 py-4 text-[13px] font-bold uppercase tracking-wider transition-all duration-200 border-b-2
                                   {{ request()->routeIs($item['route']) ? 'border-[#2B579A] text-[#2B579A]' : 'border-transparent text-slate-600 hover:text-[#2B579A] hover:border-slate-200' }}">
                                    {{ $item['name'] }}
                                </a>
                            @endforeach
                        </div>

                        <!-- Mobile Menu Button -->
                        <div class="lg:hidden w-full flex justify-between items-center py-2">
                            <span class="font-bold text-[#2B579A] text-sm uppercase tracking-widest">Navigation</span>
                            <button id="mobile-menu-button" type="button" class="text-[#2B579A] p-2 rounded-md hover:bg-slate-50 transition-colors">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path id="menu-icon-open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                                    <path id="menu-icon-close" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Mobile Navigation -->
                <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-slate-100 shadow-2xl">
                    <div class="px-4 pt-2 pb-6 space-y-1">
                        @foreach($navItems as $item)
                            @if(isset($item['dropdown']) && $item['dropdown'])
                                <div class="border-b border-slate-100">
                                    <a href="{{ route($item['route']) }}" class="block px-4 py-4 text-sm font-bold uppercase tracking-widest text-slate-600 hover:text-[#2B579A] hover:bg-slate-50 flex items-center justify-between">
                                        {{ $item['name'] }}
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </a>
                                    <div class="bg-slate-50 space-y-1">
                                        <div class="px-4 py-2 bg-slate-100 border-b border-slate-200">
                                            <h3 class="text-xs font-bold text-[#2B579A] uppercase tracking-wider">Quick Links</h3>
                                        </div>
                                        <a href="{{ route('campus-life') }}" class="flex items-center gap-3 px-6 py-3 text-sm font-medium text-slate-700 hover:text-[#2B579A] hover:bg-slate-100 transition-all duration-200">
                                            <span class="text-base">🏫</span>
                                            <div>
                                                <div class="font-semibold">Campus Life</div>
                                                <div class="text-xs opacity-75">Student activities & events</div>
                                            </div>
                                        </a>
                                        <a href="{{ route('cict-games') }}" class="flex items-center gap-3 px-6 py-3 text-sm font-medium text-slate-700 hover:text-[#2B579A] hover:bg-slate-100 transition-all duration-200">
                                            <span class="text-base">🎮</span>
                                            <div>
                                                <div class="font-semibold">CICT Games</div>
                                                <div class="text-xs opacity-75">Gaming & e-sports</div>
                                            </div>
                                        </a>
                                        <a href="{{ route('classroom') }}" class="flex items-center gap-3 px-6 py-3 text-sm font-medium text-slate-700 hover:text-[#2B579A] hover:bg-slate-100 transition-all duration-200">
                                            <span class="text-base">📚</span>
                                            <div>
                                                <div class="font-semibold">Classroom</div>
                                                <div class="text-xs opacity-75">Learning materials</div>
                                            </div>
                                        </a>
                                        <a href="{{ route('resources') }}" class="flex items-center gap-3 px-6 py-3 text-sm font-medium text-slate-700 hover:text-[#2B579A] hover:bg-slate-100 transition-all duration-200">
                                            <span class="text-base">📖</span>
                                            <div>
                                                <div class="font-semibold">Resources</div>
                                                <div class="text-xs opacity-75">Digital library & tools</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @else
                                <a href="{{ route($item['route']) }}" 
                                   class="block px-4 py-4 text-sm font-bold uppercase tracking-widest
                                   {{ request()->routeIs($item['route']) ? 'text-[#2B579A] bg-slate-50' : 'text-slate-600 hover:text-[#2B579A] hover:bg-slate-50' }}">
                                    {{ $item['name'] }}
                                </a>
                            @endif
                        @endforeach
                        <div class="border-t border-slate-100 mt-4 pt-4 px-4 pb-8">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="flex items-center justify-center gap-3 w-full py-4 bg-[#1a3a63] text-white text-xs font-black uppercase tracking-[0.2em] shadow-xl">
                                    <span>👤</span> Admin Console
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="flex items-center justify-center gap-3 w-full py-4 border-2 border-[#1a3a63] text-[#1a3a63] text-xs font-black uppercase tracking-[0.2em] hover:bg-[#1a3a63] hover:text-white transition-all">
                                    <span>🔑</span> Access Portal
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="flex-grow">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-[#1a3a63] text-white pt-20 pb-10 border-t-4 border-[#FDB913]">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16 mb-20 animate-fade-in">
                        <!-- About Column -->
                        <div>
                            <div class="flex items-center gap-3 mb-8">
                                <span class="text-4xl">🏛️</span>
                                <h3 class="text-xl font-serif font-black tracking-tight leading-tight">CICT - SJUT</h3>
                            </div>
                            <p class="text-slate-300 text-sm leading-relaxed mb-8">
                                The leading centre for ICT excellence at St. John's University, fostering innovation and producing world-class experts.
                            </p>
                            <div class="flex space-x-4">
                                <a href="#" class="w-9 h-9 rounded-full bg-white/5 flex items-center justify-center hover:bg-[#FDB913] hover:text-[#1a3a63] transition-all">f</a>
                                <a href="#" class="w-9 h-9 rounded-full bg-white/5 flex items-center justify-center hover:bg-[#FDB913] hover:text-[#1a3a63] transition-all text-xs font-black">X</a>
                                <a href="#" class="w-9 h-9 rounded-full bg-white/5 flex items-center justify-center hover:bg-[#FDB913] hover:text-[#1a3a63] transition-all">in</a>
                            </div>
                        </div>

                        <!-- Academic Units -->
                        <div>
                            <h4 class="text-[#FDB913] text-sm font-bold uppercase tracking-[0.2em] mb-8">Academic Units</h4>
                            <ul class="space-y-4 text-sm text-slate-300">
                                <li><a href="#" class="hover:text-white transition-colors">Computer Science & Engineering</a></li>
                                <li><a href="#" class="hover:text-white transition-colors">Electronics & Telecommunications</a></li>
                                <li><a href="#" class="hover:text-white transition-colors">Informatics & Information Systems</a></li>
                                <li><a href="#" class="hover:text-white transition-colors">Professional Training Unit (PTU)</a></li>
                            </ul>
                        </div>

                        <!-- Quick Links -->
                        <div>
                            <h4 class="text-[#FDB913] text-sm font-bold uppercase tracking-[0.2em] mb-8">Quick Links</h4>
                            <ul class="space-y-4 text-sm text-slate-300">
                                <li><a href="{{ route('campus-life') }}" class="hover:text-white transition-colors">
                                    Campus Life
                                </a></li>
                                <li><a href="{{ route('cict-games') }}" class="hover:text-white transition-colors">
                                    CICT Games
                                </a></li>
                                <li><a href="{{ route('classroom') }}" class="hover:text-white transition-colors">
                                    Classroom
                                </a></li>
                                <li><a href="{{ route('resources') }}" class="hover:text-white transition-colors">
                                    Resources
                                </a></li>
                            </ul>
                        </div>

                        <!-- Contact -->
                        <div>
                            <h4 class="text-[#FDB913] text-sm font-bold uppercase tracking-[0.2em] mb-8">Quick Contact</h4>
                            <div class="space-y-5 text-sm text-slate-300">
                                <div class="flex items-start gap-3">
                                    <span class="text-[#FDB913] mt-1 shrink-0">📍</span>
                                    <span>P.O. Box 35194, Kijitonyama Campus, Dar es Salaam, Tanzania</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="text-[#FDB913] shrink-0">📞</span>
                                    <span>+255 22 123 456</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="text-[#FDB913] shrink-0">✉️</span>
                                    <span>info@cict.sjut.ac.tz</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="text-[#FDB913] shrink-0">🌐</span>
                                    <span>www.cict.sjut.ac.tz</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Mailing List Section -->
                    <div class="border-t border-white/10 pt-8 mb-8">
                        <div class="max-w-2xl mx-auto text-center">
                            <h3 class="text-xl font-serif font-black text-white mb-3">Join Our Mailing List</h3>
                            <p class="text-slate-300 mb-6 text-sm">Get official news and updates directly via email</p>
                            
                            <form id="subscribe-form" class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
                                <input type="email" 
                                       id="subscribe-email"
                                       placeholder="Enter your email" 
                                       required
                                       class="flex-1 px-3 py-2 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/60 focus:outline-none focus:border-[#FDB913] focus:bg-white/20 transition-all text-sm">
                                <button type="submit" 
                                        class="px-6 py-2 bg-[#FDB913] text-[#1a3a63] font-black text-xs uppercase tracking-widest rounded-lg hover:bg-yellow-400 transition-all transform hover:scale-105 active:scale-95">
                                    Subscribe
                                </button>
                            </form>
                            
                            <div id="subscribe-message" class="mt-3 text-xs hidden">
                                <span class="text-[#FDB913] font-semibold"></span>
                            </div>
                            
                            <div class="mt-4 flex items-center justify-center gap-4 text-xs text-slate-400">
                                <span class="flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 .21-.01.421-.03.631C19.293 9.97 20 11.467 20 13c0 2.21-1.71 4-3.818 4-1.27 0-2.4-.61-3.09-1.54l-.09-.12-.09.12C12.4 16.39 11.29 17 10.02 17 7.91 17 6.2 15.21 6.2 13c0-1.924.934-3.636 2.334-4.69a8.9 8.9 0 01.036-3.311z" clip-rule="evenodd"/>
                                    </svg>
                                    No spam
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                    </svg>
                                    Unsubscribe anytime
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- copyright bar -->
                    <div class="pt-10 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-4 text-[11px] font-bold uppercase tracking-widest text-slate-500">
                        <p>&copy; {{ date('Y') }} Centre for Information and Communication Technology. All rights reserved.</p>
                        <div class="flex space-x-6">
                            <a href="#" class="hover:text-white transition-colors">Policies</a>
                            <a href="#" class="hover:text-white transition-colors">Terms</a>
                            <a href="#" class="hover:text-white transition-colors">Sitemap</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <script>
            // Subscribe functionality
            const subscribeForm = document.getElementById('subscribe-form');
            const subscribeEmail = document.getElementById('subscribe-email');
            const subscribeMessage = document.getElementById('subscribe-message');
            const messageSpan = subscribeMessage.querySelector('span');

            if (subscribeForm) {
                subscribeForm.addEventListener('submit', async (e) => {
                    e.preventDefault();
                    
                    const email = subscribeEmail.value;
                    
                    try {
                        const response = await fetch('/subscribe', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({ email: email })
                        });
                        
                        const data = await response.json();
                        
                        if (response.ok) {
                            // Store subscription in localStorage
                            localStorage.setItem('cict_subscribed', 'true');
                            localStorage.setItem('cict_email', email);
                            
                            // Show success message
                            messageSpan.textContent = '🎉 Successfully subscribed! Check your email for confirmation.';
                            subscribeMessage.classList.remove('hidden');
                            subscribeMessage.classList.add('text-green-400');
                            
                            // Clear form
                            subscribeEmail.value = '';
                            
                            // Add celebration effect
                            celebrateSubscription();
                            
                            // Hide message after 8 seconds
                            setTimeout(() => {
                                subscribeMessage.classList.add('hidden');
                            }, 8000);
                        } else {
                            throw new Error(data.message || 'Subscription failed');
                        }
                    } catch (error) {
                        messageSpan.textContent = '❌ ' + (error.message || 'Subscription failed. Please try again.');
                        subscribeMessage.classList.remove('hidden');
                        subscribeMessage.classList.add('text-red-400');
                        
                        setTimeout(() => {
                            subscribeMessage.classList.add('hidden');
                        }, 5000);
                    }
                });
            }

            // Celebration effect for successful subscription
            function celebrateSubscription() {
                const button = subscribeForm.querySelector('button[type="submit"]');
                if (button) {
                    button.innerHTML = '✅ Subscribed!';
                    button.classList.add('bg-green-500');
                    button.classList.remove('bg-[#FDB913]');
                    
                    setTimeout(() => {
                        button.innerHTML = 'Subscribe Now';
                        button.classList.remove('bg-green-500');
                        button.classList.add('bg-[#FDB913]');
                    }, 3000);
                }
                
                // Create confetti effect
                createConfetti();
            }

            // Simple confetti effect
            function createConfetti() {
                const colors = ['#FDB913', '#2B579A', '#1a3a63', '#10b981'];
                const confettiCount = 30;
                
                for (let i = 0; i < confettiCount; i++) {
                    setTimeout(() => {
                        const confetti = document.createElement('div');
                        confetti.style.cssText = `
                            position: fixed;
                            width: 8px;
                            height: 8px;
                            background: ${colors[Math.floor(Math.random() * colors.length)]};
                            left: ${Math.random() * 100}%;
                            top: -10px;
                            opacity: 1;
                            transform: rotate(${Math.random() * 360}deg);
                            transition: all 2s ease-out;
                            pointer-events: none;
                            z-index: 9999;
                        `;
                        
                        document.body.appendChild(confetti);
                        
                        setTimeout(() => {
                            confetti.style.top = '100%';
                            confetti.style.opacity = '0';
                            confetti.style.transform = `rotate(${Math.random() * 720}deg) translateX(${(Math.random() - 0.5) * 200}px)`;
                        }, 10);
                        
                        setTimeout(() => {
                            confetti.remove();
                        }, 2000);
                    }, i * 50);
                }
            }

            // Check for notifications on page load
            function checkForNotifications() {
                const isSubscribed = localStorage.getItem('cict_subscribed');
                if (isSubscribed === 'true') {
                    // Show notification badge if there are new items
                    fetch('/check-notifications')
                        .then(response => response.json())
                        .then(data => {
                            if (data.hasNew) {
                                showNotificationBadge(data.count);
                            }
                        })
                        .catch(error => console.log('Notification check failed:', error));
                }
            }

            // Show notification badge
            function showNotificationBadge(count) {
                const newsLink = document.querySelector('a[href*="news"]');
                const announcementsLink = document.querySelector('a[href*="announcements"]');
                
                if (newsLink && count.news > 0) {
                    const badge = document.createElement('span');
                    badge.className = 'absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center animate-pulse';
                    badge.textContent = count.news;
                    newsLink.parentElement.style.position = 'relative';
                    newsLink.parentElement.appendChild(badge);
                }
                
                if (announcementsLink && count.announcements > 0) {
                    const badge = document.createElement('span');
                    badge.className = 'absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center animate-pulse';
                    badge.textContent = count.announcements;
                    announcementsLink.parentElement.style.position = 'relative';
                    announcementsLink.parentElement.appendChild(badge);
                }
            }

            // Check notifications on page load
            checkForNotifications();

            // Mobile menu functionality
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuIconOpen = document.getElementById('menu-icon-open');
            const menuIconClose = document.getElementById('menu-icon-close');

            mobileMenuButton.addEventListener('click', () => {
                const isHidden = mobileMenu.classList.contains('hidden');
                
                if (isHidden) {
                    mobileMenu.classList.remove('hidden');
                    menuIconOpen.classList.add('hidden');
                    menuIconClose.classList.remove('hidden');
                } else {
                    mobileMenu.classList.add('hidden');
                    menuIconOpen.classList.remove('hidden');
                    menuIconClose.classList.add('hidden');
                }
            });
        </script>
        @stack('scripts')
    </body>
</html>
