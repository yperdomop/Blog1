<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChatgptController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('users', UserController::class)->names('admin.users');

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('categories', CategoryController::class)->names('admin.categories');

Route::resource('tags', TagController::class)->names('admin.tags');

Route::resource('posts', PostController::class)->names('admin.posts');

Route::get('chatgpt', [ChatgptController::class, 'index'])->name('admin.chatgpt.index');
