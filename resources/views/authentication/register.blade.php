@extends('layouts.auth_master')
@php($path = asset('/'))

@section('title', 'Sign Up')

@section('styles')
<style>
    /* Start Page Styling here */
</style>
@endsection

@section('content')
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-6">
            <!-- Register Card -->
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

                    <form id="formAuthentication" class="mb-6" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-6">
                            <label for="name" class="form-label">@lang('Name')</label>
                            <input
                                type="text"
                                class="form-control cls_required"
                                id="name"
                                name="name"
                                placeholder="Enter your name"
                                autofocus />
                            <small class="form-errors text-danger pull-right req" value="*"></small>

                        </div>
                        <div class="mb-6">
                            <label for="email" class="form-label">@lang('Email')</label>
                            <input type="text" class="form-control cls_email" id="email" name="email" placeholder="Enter your email" />
                            <small class="form-errors text-danger pull-right req" value="*"></small>

                        </div>
                        <div class="mb-6 form-password-toggle">
                            <label class="form-label" for="password">@lang('Password')</label>
                            <div class="input-group input-group-merge">
                                <input
                                    type="password"
                                    name="password"
                                    autocomplete="new-password"
                                    id="password"
                                    class="form-control cls_required"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                            <small class="form-errors text-danger pull-right req" value="*"></small>

                        </div>
                        <div class="mb-6 form-password-toggle">
                            <label class="form-label" for="password">@lang('Confirm Password')</label>
                            <div class="input-group input-group-merge">
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    autocomplete="new-password"
                                    id="password"
                                    class="form-control cls_required"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                            <small class="form-errors text-danger pull-right req" value="*"></small>

                        </div>

                        <div class="my-8">
                            <div class="form-check mb-0 ms-2">
                                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                                <label class="form-check-label" for="terms-conditions">
                                    I agree to
                                    <a href="javascript:void(0);">privacy policy & terms</a>
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-primary d-grid w-100" onclick="formSubmit(event, this, '#formAuthentication')">Sign up</button>
                    </form>

                    <p class="text-center">
                        <span>Already have an account?</span>
                        <a href="auth-login-basic.html">
                            <span>Sign in instead</span>
                        </a>
                    </p>

                    <div class="divider my-6">
                        <div class="divider-text">or</div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <a href="javascript:;" class="btn btn-sm btn-icon rounded-pill btn-text-facebook me-1_5">
                            <i class="tf-icons ti ti-brand-facebook-filled"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-sm btn-icon rounded-pill btn-text-twitter me-1_5">
                            <i class="tf-icons ti ti-brand-twitter-filled"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-sm btn-icon rounded-pill btn-text-github me-1_5">
                            <i class="tf-icons ti ti-brand-github-filled"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-sm btn-icon rounded-pill btn-text-google-plus">
                            <i class="tf-icons ti ti-brand-google-filled"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Register Card -->
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
