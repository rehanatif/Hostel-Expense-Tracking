@extends('layouts.master')
@php($path = asset('/'))

@section('title', 'Dashboard')

@section('styles')
<style>
    .feature-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-left: 4px solid #7367f0;
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .tech-badge {
        background: linear-gradient(45deg, #7367f0, #9c88ff);
        color: white;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        margin: 2px;
        display: inline-block;
    }

    .credits-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 10px;
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .feature-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(45deg, #7367f0, #9c88ff);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }
</style>
@endsection

@section('content')
<!-- Credits Section -->
<div class="credits-section">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h2 class="mb-3"><i class="fas fa-code me-2"></i>Exelorithm LLC - Laravel Boilerplate</h2>
            <p class="mb-2"><strong>Developed by:</strong> Rehan Atif</p>
            <p class="mb-2"><strong>Commissioned by:</strong> Mr. Hasnain Haider (CEO)</p>
            <p class="mb-0"><strong>Created on:</strong> {{ date('F d, Y') }}</p>
        </div>
        <div class="col-md-4 text-end">
            <div class="feature-icon mx-auto">
                <i class="fas fa-rocket"></i>
            </div>
        </div>
    </div>
</div>

<!-- Tech Stack Overview -->
<div class="row g-6 mb-6">
    <div class="col-md-12">
        <div class="card feature-card">
            <div class="card-header">
                <h4 class="card-title mb-0"><i class="fas fa-layer-group me-2"></i>Technology Stack</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="mb-3">Backend Technologies</h6>
                        <span class="tech-badge">Laravel 12</span>
                        <span class="tech-badge">PHP 8.2+</span>
                        <span class="tech-badge">MySQL</span>
                        <span class="tech-badge">Spatie Permissions</span>
                        <span class="tech-badge">Yajra DataTables</span>
                        <span class="tech-badge">Laravel Breeze</span>
                    </div>
                    <div class="col-md-6">
                        <h6 class="mb-3">Frontend Technologies</h6>
                        <span class="tech-badge">Vuexy Admin Template</span>
                        <span class="tech-badge">Bootstrap 5</span>
                        <span class="tech-badge">Vite</span>
                        <span class="tech-badge">Tailwind CSS</span>
                        <span class="tech-badge">JavaScript ES6+</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Core Features -->
<div class="row g-6 mb-6">
    <div class="col-md-12">
        <div class="card feature-card">
            <div class="card-header">
                <h4 class="card-title mb-0"><i class="fas fa-cogs me-2"></i>Implemented Features</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="mb-3 text-primary">Authentication & Authorization</h6>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>User Registration & Login</li>
                            <li><i class="fas fa-check text-success me-2"></i>Password Reset Functionality</li>
                            <li><i class="fas fa-check text-success me-2"></i>Email Verification</li>
                            <li><i class="fas fa-check text-success me-2"></i>Role-Based Access Control (RBAC)</li>
                            <li><i class="fas fa-check text-success me-2"></i>Permission Management System</li>
                            <li><i class="fas fa-check text-success me-2"></i>Profile Management</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6 class="mb-3 text-primary">Data Management</h6>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Database Migrations</li>
                            <li><i class="fas fa-check text-success me-2"></i>Model Seeders</li>
                            <li><i class="fas fa-check text-success me-2"></i>DataTables Integration</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pagination Support</li>
                            <li><i class="fas fa-check text-success me-2"></i>Search & Filtering</li>
                            <li><i class="fas fa-check text-success me-2"></i>Activity Logging</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Development Tools & Helpers -->
<div class="row g-6 mb-6">
    <div class="col-md-6">
        <div class="card feature-card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-tools me-2"></i>Custom Helpers & Services</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li><i class="fas fa-code text-info me-2"></i><strong>ExoHelper Class:</strong> Comprehensive utility functions</li>
                    <li><i class="fas fa-code text-info me-2"></i><strong>CustomTranslator:</strong> Multi-language support service</li>
                    <li><i class="fas fa-code text-info me-2"></i><strong>HelperServiceProvider:</strong> Service container bindings</li>
                    <li><i class="fas fa-code text-info me-2"></i><strong>ExoHelperFacade:</strong> Facade for easy access</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card feature-card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-globe me-2"></i>Internationalization</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li><i class="fas fa-language text-info me-2"></i><strong>Multi-language Support:</strong> English & French</li>
                    <li><i class="fas fa-language text-info me-2"></i><strong>Dynamic Locale Switching</strong></li>
                    <li><i class="fas fa-language text-info me-2"></i><strong>Translation Management</strong></li>
                    <li><i class="fas fa-language text-info me-2"></i><strong>Localized Date/Time Formatting</strong></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Database Structure -->
<div class="row g-6 mb-6">
    <div class="col-md-12">
        <div class="card feature-card">
            <div class="card-header">
                <h4 class="card-title mb-0"><i class="fas fa-database me-2"></i>Database Structure & Seeders</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="mb-3 text-primary">Migrations</h6>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-table text-success me-2"></i>Users Table with Extended Fields</li>
                            <li><i class="fas fa-table text-success me-2"></i>Cache & Jobs Tables</li>
                            <li><i class="fas fa-table text-success me-2"></i>Spatie Permission Tables</li>
                            <li><i class="fas fa-table text-success me-2"></i>Activity Log Tables</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6 class="mb-3 text-primary">Seeders</h6>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-seedling text-success me-2"></i>PermissionSeeder (200+ permissions)</li>
                            <li><i class="fas fa-seedling text-success me-2"></i>RoleSeeder (5 default roles)</li>
                            <li><i class="fas fa-seedling text-success me-2"></i>UserSeeder (Admin user)</li>
                            <li><i class="fas fa-seedling text-success me-2"></i>DatabaseSeeder (Main seeder)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Package Integrations -->
<div class="row g-6 mb-6">
    <div class="col-md-12">
        <div class="card feature-card">
            <div class="card-header">
                <h4 class="card-title mb-0"><i class="fas fa-puzzle-piece me-2"></i>Package Integrations</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="mb-3 text-primary">Core Packages</h6>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-shield-alt text-warning me-2"></i><strong>Spatie Laravel Permission:</strong> Role & Permission Management</li>
                            <li><i class="fas fa-table text-warning me-2"></i><strong>Yajra DataTables:</strong> Advanced Table Management</li>
                            <li><i class="fas fa-language text-warning me-2"></i><strong>Laravel Translation:</strong> Multi-language Support</li>
                            <li><i class="fas fa-history text-warning me-2"></i><strong>Spatie Activity Log:</strong> User Activity Tracking</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h6 class="mb-3 text-primary">Development Tools</h6>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-wind text-warning me-2"></i><strong>Laravel Breeze:</strong> Authentication Scaffolding</li>
                            <li><i class="fas fa-paint-brush text-warning me-2"></i><strong>Laravel Pint:</strong> Code Style Fixer</li>
                            <li><i class="fas fa-ship text-warning me-2"></i><strong>Laravel Sail:</strong> Docker Development Environment</li>
                            <li><i class="fas fa-test-tube text-warning me-2"></i><strong>PHPUnit:</strong> Testing Framework</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h6 class="mb-3 text-primary">Frontend Packages</h6>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-palette text-warning me-2"></i><strong>Vuexy Admin Template:</strong> Premium UI Framework</li>
                            <li><i class="fas fa-css3 text-warning me-2"></i><strong>Bootstrap 5:</strong> CSS Framework</li>
                            <li><i class="fas fa-bolt text-warning me-2"></i><strong>Vite:</strong> Build Tool</li>
                            <li><i class="fas fa-wind text-warning me-2"></i><strong>Tailwind CSS:</strong> Utility-first CSS</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom JavaScript Libraries -->
<div class="row g-6 mb-6">
    <div class="col-md-12">
        <div class="card feature-card">
            <div class="card-header">
                <h4 class="card-title mb-0"><i class="fas fa-code me-2"></i>Custom JavaScript Libraries</h4>
                <div class="badge bg-gradient-primary ms-2">6 Years Experience</div>
            </div>
            <div class="card-body">
                <div class="alert alert-info mb-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-star text-warning me-2"></i>
                        <div>
                            <strong>Masterpiece Library:</strong> These custom JavaScript libraries represent <strong>6 years of development experience</strong> by <strong>Rehan Atif</strong>.
                            This is a comprehensive, battle-tested solution for modern web applications with advanced form handling, validation, and AJAX operations.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="mb-3 text-primary">Generic.js - Form & AJAX Library</h6>
                        <p class="text-muted mb-3"><strong>Created by:</strong> Rehan Atif | <strong>Experience:</strong> 6 Years | Comprehensive library for form submissions, AJAX operations, and UI interactions.</p>

                        <h6 class="mb-2">Form Submission Functions:</h6>
                        <ul class="list-unstyled small">
                            <li><code>formSubmit()</code> - Basic form submission with validation</li>
                            <li><code>formSubmitWithModal()</code> - Form submission with modal handling</li>
                            <li><code>formSubmitWithDrwar()</code> - Form submission with drawer support</li>
                        </ul>

                        <h6 class="mb-2">AJAX Operations:</h6>
                        <ul class="list-unstyled small">
                            <li><code>onFetchFormModal()</code> - Load modal content via AJAX</li>
                            <li><code>deleteRecord()</code> - Delete records with confirmation</li>
                            <li><code>changeStatus()</code> - Change record status</li>
                            <li><code>serachValue()</code> - Search functionality</li>
                        </ul>

                        <h6 class="mb-2">UI Utilities:</h6>
                        <ul class="list-unstyled small">
                            <li><code>showAjaxLoader()</code> / <code>removeAjaxLoader()</code> - Loading states</li>
                            <li><code>messageToaster()</code> - Toast notifications</li>
                            <li><code>numberFormat()</code> - Number formatting</li>
                            <li><code>initSelect2()</code> - Select2 initialization</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6 class="mb-3 text-primary">Custom_Validation.js - Form Validation</h6>
                        <p class="text-muted mb-3"><strong>Created by:</strong> Rehan Atif | <strong>Experience:</strong> 6 Years | Advanced form validation library with real-time feedback and error handling.</p>

                        <h6 class="mb-2">Validation Classes:</h6>
                        <ul class="list-unstyled small">
                            <li><code>.cls_required</code> - Required field validation</li>
                            <li><code>.cls_email</code> - Email format validation</li>
                            <li><code>.cls_contact</code> - Japanese phone number validation</li>
                            <li><code>.cls_number_format</code> - Number formatting & validation</li>
                            <li><code>.cls_selection</code> - Dropdown validation</li>
                            <li><code>.cls_date</code> - Date field validation</li>
                            <li><code>.cls_pass</code> / <code>.cls_conf_pass</code> - Password validation</li>
                        </ul>

                        <h6 class="mb-2">Validation Functions:</h6>
                        <ul class="list-unstyled small">
                            <li><code>validate_email_address()</code> - Email validation</li>
                            <li><code>validate_contact()</code> - Phone validation</li>
                            <li><code>validate_password()</code> - Password strength & match</li>
                            <li><code>field_isempty()</code> - Empty field check</li>
                            <li><code>field_refersh()</code> - Clear field errors</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript Library Usage Examples -->
<div class="row g-6 mb-6">
    <div class="col-md-12">
        <div class="card feature-card">
            <div class="card-header">
                <h4 class="card-title mb-0"><i class="fas fa-book me-2"></i>JavaScript Library Usage Examples</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="mb-3 text-primary">Form Submission Examples</h6>

                        <div class="bg-light p-3 rounded mb-3">
                            <h6 class="small mb-2">Basic Form Submission:</h6>
                            <code class="small">
                                &lt;form id="#myForm" action="/submit" method="POST"&gt;<br>
                                &nbsp;&nbsp;&lt;input class="cls_required" name="name"&gt;<br>
                                &nbsp;&nbsp;&lt;small class="req" value="*"&gt;&lt;/small&gt;<br>
                                &nbsp;&nbsp;&lt;button onclick="formSubmit(event, this, '#myForm')"&gt;Submit&lt;/button&gt;<br>
                                &lt;/form&gt;
                            </code>
                        </div>

                        <div class="bg-light p-3 rounded mb-3">
                            <h6 class="small mb-2">Modal Form Submission:</h6>
                            <code class="small">
                                &lt;button onclick="formSubmitWithModal(event, this, '#modalId', '#formId', '#tableId')"&gt;<br>
                                &nbsp;&nbsp;Submit with Modal<br>
                                &lt;/button&gt;
                            </code>
                        </div>

                        <div class="bg-light p-3 rounded">
                            <h6 class="small mb-2">Delete with Confirmation:</h6>
                            <code class="small">
                                &lt;button onclick="deleteRecord(event, this, '/delete/1', '#tableId')"<br>
                                &nbsp;&nbsp;title="Delete Record" content="Are you sure?"&gt;<br>
                                &nbsp;&nbsp;Delete<br>
                                &lt;/button&gt;
                            </code>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="mb-3 text-primary">Validation Examples</h6>

                        <div class="bg-light p-3 rounded mb-3">
                            <h6 class="small mb-2">Required Field with Validation:</h6>
                            <code class="small">
                                &lt;input class="cls_required" name="name"&gt;<br>
                                &lt;small class="req" value="*"&gt;&lt;/small&gt;
                            </code>
                        </div>

                        <div class="bg-light p-3 rounded mb-3">
                            <h6 class="small mb-2">Email Validation:</h6>
                            <code class="small">
                                &lt;input class="cls_email" name="email"&gt;<br>
                                &lt;small class="req" value="*"&gt;&lt;/small&gt;
                            </code>
                        </div>

                        <div class="bg-light p-3 rounded mb-3">
                            <h6 class="small mb-2">Number Formatting:</h6>
                            <code class="small">
                                &lt;input class="cls_number_format" name="amount"&gt;<br>
                                &lt;!-- Auto-formats: 1000 → 1,000.00 --&gt;
                            </code>
                        </div>

                        <div class="bg-light p-3 rounded">
                            <h6 class="small mb-2">Select2 Initialization:</h6>
                            <code class="small">
                                initSelect2('#mySelect', 'Choose Option', false, '100%', '/api/search', 2);
                            </code>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Start Guide -->
<div class="row g-6 mb-6">
    <div class="col-md-12">
        <div class="card feature-card">
            <div class="card-header">
                <h4 class="card-title mb-0"><i class="fas fa-rocket me-2"></i>Quick Start Guide</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="mb-3 text-primary">Setup Commands</h6>
                        <div class="bg-light p-3 rounded">
                            <code>
                                composer install<br>
                                npm install<br>
                                cp .env.example .env<br>
                                php artisan key:generate<br>
                                php artisan migrate --seed<br>
                                php artisan storage:link<br>
                                npm run dev
                            </code>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="mb-3 text-primary">Default Credentials</h6>
                        <div class="bg-light p-3 rounded">
                            <strong>Email:</strong> rehan.a@exodevs.com<br>
                            <strong>Password:</strong> Exo-1122<br>
                            <strong>Role:</strong> Admin (Full Access)
                        </div>
                    </div>
                </div>
            </div>
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