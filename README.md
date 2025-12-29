# Exelorithm LLC - Laravel 12 Boilerplate

<div align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</div>

<div align="center">
  <h3>🚀 Professional Laravel Boilerplate with Vuexy Admin Template</h3>
  <p><strong>Developed by:</strong> Rehan Atif | <strong>Commissioned by:</strong> Mr. Hasnain Haider (CEO) | <strong>Created:</strong> 17 Sep 2025</p>
</div>

---

## 📋 Table of Contents

- [Overview](#overview)
- [Technology Stack](#technology-stack)
- [Features](#features)
- [Custom JavaScript Libraries](#custom-javascript-libraries)
- [Installation](#installation)
- [Default Credentials](#default-credentials)
- [Usage Examples](#usage-examples)
- [Contributing](#contributing)
- [License](#license)

## 🎯 Overview

This Laravel 12 boilerplate is a comprehensive, production-ready foundation designed to accelerate development for Exelorithm LLC projects. Built with modern best practices and includes authentication, user management, role-based permissions, and a beautiful admin interface.

### Key Highlights
- ✅ **Laravel 12** with PHP 8.2+
- ✅ **Vuexy Admin Template** (Premium UI Framework)
- ✅ **Complete Authentication System**
- ✅ **Role-Based Access Control (RBAC)**
- ✅ **Multi-language Support**
- ✅ **Custom JavaScript Libraries** (6 Years Experience)
- ✅ **DataTables Integration**
- ✅ **Activity Logging**

## 🛠 Technology Stack

### Backend Technologies
- **Laravel 12** - PHP Framework
- **PHP 8.2+** - Programming Language
- **MySQL** - Database
- **Spatie Permissions** - Role & Permission Management
- **Yajra DataTables** - Advanced Table Management
- **Laravel Breeze** - Authentication Scaffolding

### Frontend Technologies
- **Vuexy Admin Template** - Premium UI Framework
- **Bootstrap 5** - CSS Framework
- **Vite** - Build Tool
- **Tailwind CSS** - Utility-first CSS
- **JavaScript ES6+** - Frontend Logic

### Development Tools
- **Laravel Pint** - Code Style Fixer
- **Laravel Sail** - Docker Development Environment
- **PHPUnit** - Testing Framework
- **Laravel Pail** - Log Viewer

## ✨ Features

### Authentication & Authorization
- ✅ User Registration & Login
- ✅ Password Reset Functionality
- ✅ Email Verification
- ✅ Role-Based Access Control (RBAC)
- ✅ Permission Management System
- ✅ Profile Management

### Data Management
- ✅ Database Migrations
- ✅ Model Seeders
- ✅ DataTables Integration
- ✅ Pagination Support
- ✅ Search & Filtering
- ✅ Activity Logging

### Custom Helpers & Services
- ✅ **ExoHelper Class** - Comprehensive utility functions
- ✅ **CustomTranslator** - Multi-language support service
- ✅ **HelperServiceProvider** - Service container bindings
- ✅ **ExoHelperFacade** - Facade for easy access

### Internationalization
- ✅ **Multi-language Support** - English & French
- ✅ **Dynamic Locale Switching**
- ✅ **Translation Management**
- ✅ **Localized Date/Time Formatting**

### Database Structure & Seeders
- ✅ **Users Table** with Extended Fields
- ✅ **Cache & Jobs Tables**
- ✅ **Spatie Permission Tables**
- ✅ **Activity Log Tables**
- ✅ **PermissionSeeder** (200+ permissions)
- ✅ **RoleSeeder** (5 default roles)
- ✅ **UserSeeder** (Admin user)

## 🎨 Custom JavaScript Libraries

<div align="center">
  <h4>🌟 Masterpiece Library - 6 Years Experience by Rehan Atif</h4>
  <p>These custom JavaScript libraries represent <strong>6 years of development experience</strong> and provide comprehensive solutions for modern web applications.</p>
</div>

### Generic.js - Form & AJAX Library
**Created by:** Rehan Atif | **Experience:** 6 Years

#### Form Submission Functions
- `formSubmit()` - Basic form submission with validation
- `formSubmitWithModal()` - Form submission with modal handling
- `formSubmitWithDrwar()` - Form submission with drawer support

#### AJAX Operations
- `onFetchFormModal()` - Load modal content via AJAX
- `deleteRecord()` - Delete records with confirmation
- `changeStatus()` - Change record status
- `serachValue()` - Search functionality

#### UI Utilities
- `showAjaxLoader()` / `removeAjaxLoader()` - Loading states
- `messageToaster()` - Toast notifications
- `numberFormat()` - Number formatting
- `initSelect2()` - Select2 initialization

### Custom_Validation.js - Form Validation
**Created by:** Rehan Atif | **Experience:** 6 Years

#### Validation Classes
- `.cls_required` - Required field validation
- `.cls_email` - Email format validation
- `.cls_contact` - Japanese phone number validation
- `.cls_number_format` - Number formatting & validation
- `.cls_selection` - Dropdown validation
- `.cls_date` - Date field validation
- `.cls_pass` / `.cls_conf_pass` - Password validation

#### Validation Functions
- `validate_email_address()` - Email validation
- `validate_contact()` - Phone validation
- `validate_password()` - Password strength & match
- `field_isempty()` - Empty field check
- `field_refersh()` - Clear field errors

## 🚀 Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js & NPM
- MySQL

### Setup Commands

```bash
# Clone the repository
git clone <repository-url>
cd laravel-boilerplate

# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install

# Environment setup
cp .env.example .env
php artisan key:generate

# Database setup
php artisan migrate --seed

# Create storage link
php artisan storage:link

# Build assets
npm run dev
```

### Development Server

```bash
# Start Laravel development server
php artisan serve

# Start Vite development server (in another terminal)
npm run dev
```

## 🔑 Default Credentials

| Field | Value |
|-------|-------|
| **Email** | rehan.a@exodevs.com |
| **Password** | Exo-1122 |
| **Role** | Admin (Full Access) |

## 💡 Usage Examples

### Form Submission with Validation

```html
<form id="#myForm" action="/submit" method="POST">
    <input class="cls_required" name="name" placeholder="Name">
    <small class="req" value="*"></small>
    
    <input class="cls_email" name="email" placeholder="Email">
    <small class="req" value="*"></small>
    
    <input class="cls_number_format" name="amount" placeholder="Amount">
    
    <button onclick="formSubmit(event, this, '#myForm')">Submit</button>
</form>
```

### Modal Form Submission

```html
<button onclick="formSubmitWithModal(event, this, '#modalId', '#formId', '#tableId')">
    Submit with Modal
</button>
```

### Delete with Confirmation

```html
<button onclick="deleteRecord(event, this, '/delete/1', '#tableId')"
        title="Delete Record" 
        content="Are you sure?">
    Delete
</button>
```

### Select2 Initialization

```javascript
initSelect2('#mySelect', 'Choose Option', false, '100%', '/api/search', 2);
```

### Number Formatting

```html
<input class="cls_number_format" name="amount">
<!-- Auto-formats: 1000 → 1,000.00 -->
```

## 📦 Package Integrations

### Core Packages
- **Spatie Laravel Permission** - Role & Permission Management
- **Yajra DataTables** - Advanced Table Management
- **Laravel Translation** - Multi-language Support
- **Spatie Activity Log** - User Activity Tracking

### Development Tools
- **Laravel Breeze** - Authentication Scaffolding
- **Laravel Pint** - Code Style Fixer
- **Laravel Sail** - Docker Development Environment
- **PHPUnit** - Testing Framework

### Frontend Packages
- **Vuexy Admin Template** - Premium UI Framework
- **Bootstrap 5** - CSS Framework
- **Vite** - Build Tool
- **Tailwind CSS** - Utility-first CSS

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👨‍💻 Developer

**Rehan Atif** - *Lead Developer*
- Email: rehan.a@exodevs.com
- Company: Exelorithm LLC

**Mr. Hasnain Haider** - *CEO*
- Company: Exelorithm LLC

---

<div align="center">
  <p>Made with ❤️ by <strong>Rehan Atif</strong> for <strong>Exelorithm LLC</strong></p>
  <p>© 2025 Exelorithm LLC. All rights reserved.</p>
</div>
