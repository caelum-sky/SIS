@extends('layouts.mainlayout')
@section('title', 'Dashboard')
@section('content')
<div class="main-panel">
    
    <!-- Profile Information Section -->
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <!-- Profile Information -->
            <div class="card shadow-lg rounded-4 border-0 mb-4 p-4 text-center">
                <div class="card-header bg-primary text-white fw-bold rounded-top-4">
                    {{ __('Profile Information') }}
                </div>
                <div class="card-body p-4">
                    
                    <!-- Profile Image -->
                    <div class="d-flex justify-content-center mb-4">
                        <img src="{{ asset('img/1.png') }}" 
                            
                             class="rounded-circle shadow-sm" 
                             width="120" height="120">
                    </div>

                    <!-- User Information -->
                    <h4 class="fw-bold text-primary">{{ Auth::user()->name }}</h4>
                    <p class="text-muted">{{ Auth::user()->email }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
