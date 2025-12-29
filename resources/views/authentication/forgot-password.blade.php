@extends('layouts.auth_master')
@php($path = asset('/'))

@section('title', 'Login')

@section('styles')
<style>
    /* Start Page Styling here */
</style>
@endsection

@section('content')
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-6">
            <!-- Forgot Password -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mb-6">
                        <a href="index.html" class="app-brand-link">
                            <img src="{{ $path }}assets/img/excelorith.png" style="width: 200px;" alt="">
                            <!-- <span class="app-brand-text demo text-heading fw-bold">Vuexy</span> -->
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-1">Welcome to Excelorithm! 👋</h4>
                    <p class="mb-6">Please sign-in to your account and start the adventure</p>

                    <form id="formAuthentication" class="mb-6" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mb-6">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email" name="email"
                                class="form-control"
                                id="email"
                                placeholder="Enter your email"
                                autofocus />
                            <small class="form-errors text-danger pull-right req" value="*"></small>

                        </div>
                        <button class="btn btn-primary d-grid w-100" onclick="formSubmit(event, this, '#formAuthentication')">{{ __('Email Password Reset Link') }}</button>
                    </form>
                    <div class="text-center">
                        <a href="{{ route('login') }}" class="d-flex justify-content-center">
                            <i class="ti ti-chevron-left scaleX-n1-rtl me-1_5"></i>
                            Back to login
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Forgot Password -->
        </div>
    </div>
</div>
@endsection

@section('modals')
<!-- Include Bootstrap Modals Here -->
@endsection

@section('scripts')
<script>
    // Start Page Scripts
</script>
@endsection
