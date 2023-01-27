<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AttributeValueController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\OwnerTypeController;
use App\Http\Controllers\Admin\PropertyTypeController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\VerificationController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::middleware('auth')
    ->prefix('/admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('customers', CustomerController::class)->except(['create', 'store'])->middleware('can:customers');
        Route::resource('verifications', VerificationController::class)->only(['index'])->middleware('can:verifications');
        Route::resource('properties', PropertyController::class)->middleware('can:properties');
        Route::resource('propertyTypes', PropertyTypeController::class)->except(['show'])->middleware('can:propertyTypes');
        Route::resource('options', OptionController::class)->except(['show'])->middleware('can:options');
        Route::resource('ownerTypes', OwnerTypeController::class)->except(['show'])->middleware('can:brands');
        Route::resource('attributes', AttributeController::class)->except(['show'])->middleware('can:attributes');
        Route::resource('attributeValues', AttributeValueController::class)->except(['index', 'show'])->middleware('can:attributes');
        Route::resource('locations', LocationController::class)->except(['show'])->middleware('can:locations');
        Route::resource('users', UserController::class)->except(['show'])->middleware('can:users');
    });