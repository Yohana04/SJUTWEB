<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found | SJUT</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .error-number {
            font-size: 8rem;
            font-weight: 900;
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 10px 40px rgba(239, 68, 68, 0.3);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 to-slate-100 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <span class="text-2xl mr-3">🏛️</span>
                        <div class="flex flex-col">
                            <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">SJUT</span>
                            <span class="text-xs text-slate-500 uppercase tracking-wider">University</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/" class="text-slate-600 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        Home
                    </a>
                    <a href="/dashboard" class="text-slate-600 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        Dashboard
                    </a>
                    <a href="/contact" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors">
                        Contact Support
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center">
            <!-- Error Number -->
            <div class="floating mb-8">
                <h1 class="error-number">404</h1>
            </div>
            
            <!-- Error Message -->
            <h2 class="text-4xl font-bold text-slate-900 mb-4">
                Page Not Found
            </h2>
            
            <p class="text-xl text-slate-600 mb-8">
                Please Try Again Later
            </p>
            
            <p class="text-lg text-slate-500 mb-12 max-w-2xl mx-auto">
                The page you're looking for is currently unavailable. This might be due to maintenance or the page has been moved. Please try again later.
            </p>
            
            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-16">
                <a href="/" class="inline-flex items-center justify-center px-8 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-all transform hover:scale-105 shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Go Home
                </a>
                <button onclick="history.back()" class="inline-flex items-center justify-center px-8 py-3 bg-white text-slate-700 font-medium rounded-lg border border-slate-300 hover:bg-slate-50 transition-all transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Go Back
                </button>
            </div>

            <!-- Helpful Links -->
            <div class="bg-white rounded-xl border border-slate-200 p-8 shadow-sm">
                <h3 class="text-lg font-semibold text-slate-900 mb-6">You might be looking for:</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="/programs" class="flex items-center p-4 rounded-lg border border-slate-200 hover:bg-slate-50 transition-colors group">
                        <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center mr-4 group-hover:bg-blue-600 transition-colors">
                            <svg class="w-5 h-5 text-blue-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <div class="text-left">
                            <h4 class="font-medium text-slate-900">Academic Programs</h4>
                            <p class="text-sm text-slate-500">Explore our programs</p>
                        </div>
                    </a>

                    <a href="/news" class="flex items-center p-4 rounded-lg border border-slate-200 hover:bg-slate-50 transition-colors group">
                        <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center mr-4 group-hover:bg-green-600 transition-colors">
                            <svg class="w-5 h-5 text-green-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                        </div>
                        <div class="text-left">
                            <h4 class="font-medium text-slate-900">Latest News</h4>
                            <p class="text-sm text-slate-500">University updates</p>
                        </div>
                    </a>

                    <a href="/dashboard" class="flex items-center p-4 rounded-lg border border-slate-200 hover:bg-slate-50 transition-colors group">
                        <div class="w-10 h-10 bg-purple-50 rounded-lg flex items-center justify-center mr-4 group-hover:bg-purple-600 transition-colors">
                            <svg class="w-5 h-5 text-purple-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <div class="text-left">
                            <h4 class="font-medium text-slate-900">Dashboard</h4>
                            <p class="text-sm text-slate-500">Admin panel</p>
                        </div>
                    </a>

                    <a href="/contact" class="flex items-center p-4 rounded-lg border border-slate-200 hover:bg-slate-50 transition-colors group">
                        <div class="w-10 h-10 bg-orange-50 rounded-lg flex items-center justify-center mr-4 group-hover:bg-orange-600 transition-colors">
                            <svg class="w-5 h-5 text-orange-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div class="text-left">
                            <h4 class="font-medium text-slate-900">Contact Us</h4>
                            <p class="text-sm text-slate-500">Get in touch</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Retry Information -->
            <div class="mt-12 text-center">
                <div class="inline-flex items-center px-4 py-2 bg-amber-50 border border-amber-200 rounded-lg">
                    <svg class="w-5 h-5 text-amber-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.502 0L4.268 18.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                    <span class="text-amber-800 font-medium">This page may be available later. Please check back soon.</span>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center">
                <div class="flex items-center justify-center mb-4">
                    <span class="text-2xl mr-3">🏛️</span>
                    <div class="flex flex-col">
                        <span class="text-sm font-bold text-blue-400 uppercase tracking-wider">SJUT</span>
                        <span class="text-xs text-slate-400 uppercase tracking-wider">St. John University of Tanzania</span>
                    </div>
                </div>
                <p class="text-slate-400 text-sm">
                    © {{ date('Y') }} SJUT. All rights reserved. | 
                    <a href="/privacy" class="text-blue-400 hover:text-blue-300 transition-colors">Privacy Policy</a> | 
                    <a href="/terms" class="text-blue-400 hover:text-blue-300 transition-colors">Terms of Service</a>
                </p>
            </div>
        </div>
    </footer>

    <script>
        // Auto refresh after 30 seconds
        setTimeout(() => {
            if (confirm('Would you like to retry loading this page?')) {
                window.location.reload();
            }
        }, 30000);

        // Add some interactivity
        document.addEventListener('DOMContentLoaded', function() {
            // Animate error number on load
            const errorNumber = document.querySelector('.error-number');
            if (errorNumber) {
                errorNumber.style.opacity = '0';
                errorNumber.style.transform = 'scale(0.5)';
                setTimeout(() => {
                    errorNumber.style.transition = 'all 1s ease';
                    errorNumber.style.opacity = '1';
                    errorNumber.style.transform = 'scale(1)';
                }, 100);
            }
        });
    </script>
</body>
</html>
