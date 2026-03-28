@extends('layouts.cict')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <!-- Header Section -->
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-serif font-black text-[#2B579A] mb-6">
                📚 Classroom
            </h1>
            <p class="text-xl text-slate-600 max-w-3xl mx-auto leading-relaxed">
                Access your learning materials, assignments, and educational resources in our digital classroom environment.
            </p>
        </div>

        <!-- Content Placeholder -->
        <div class="bg-white rounded-2xl shadow-xl p-12 text-center">
            <div class="text-6xl mb-6">📚</div>
            <h2 class="text-2xl font-bold text-[#2B579A] mb-4">Coming Soon</h2>
            <p class="text-slate-600 mb-8">
                This section is under development. Check back soon for course materials, lecture notes, and interactive learning tools.
            </p>
            <a href="{{ route('home') }}" class="inline-flex items-center px-8 py-3 bg-[#2B579A] text-white font-bold uppercase tracking-widest hover:bg-[#1a3a63] transition-colors">
                ← Back to Home
            </a>
        </div>
    </div>
</div>
@endsection
