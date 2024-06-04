<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Website\WebAboutController;
use App\Http\Controllers\Website\WebContactController;
use App\Http\Controllers\Website\WebFacilitiesController;
use App\Http\Controllers\Website\WebHomeController;
use App\Http\Controllers\Website\WebTeamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\WhyUsController;
use App\Http\Controllers\VisionMissionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ClientsController;

use App\Http\Controllers\Home;
use App\Http\Controllers\SettingsController;
Route::get('/', [WebHomeController::class, 'show'])->name('web-home');
Route::get('/tentang-kami', [WebAboutController::class, 'show'])->name('web-about');
Route::get('/ekstrakurikuler', [WebHomeController::class, 'ekskul'])->name('web-ekskul');
Route::get('/visi-misi', [WebHomeController::class, 'visi_misi'])->name('web-visi-misi');
Route::get('/program-unggulan', [WebHomeController::class, 'program_unggulan'])->name('web-program-unggulan');
Route::get('/ppdb-online', [WebHomeController::class, 'ppdb_online'])->name('web-ppdb-online');
Route::get('/fasilitas', [WebFacilitiesController::class, 'show'])->name('web-facilities');
Route::get('/tim-kami', [WebTeamController::class, 'show'])->name('web-team');
Route::get('/hubungi-kami', [WebContactController::class, 'show'])->name('web-contact');
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::middleware('auth')->group(function () { 

    //page about
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::put('/about', [AboutController::class, 'update'])->name('about.update');
    Route::delete('/whyus/{id}', [WhyUsController::class, 'destroy'])->name('whyus.destroy');
    Route::put('/whyus/{id}', [WhyUsController::class, 'update'])->name('whyus.update');
    Route::post('/whyus', [WhyUsController::class, 'store'])->name('whyus.store');

    //page home
    Route::get('/home', [Home::class, 'index'])->name('home');
    Route::put('/home', [Home::class, 'update'])->name('home.update');

    //page team
    Route::get('/team', [TeamController::class, 'index'])->name('team');
    Route::post('/team-store', [TeamController::class, 'store'])->name('team.store');
    Route::put('/team-hero', [TeamController::class, 'update_hero'])->name('team.update_hero');
    Route::put('/team-update/{id}', [TeamController::class, 'update'])->name('team.update');
    Route::delete('/team-dastroy/{id}', [TeamController::class, 'destroy'])->name('team.destroy');

    //page facilities
    Route::get('/facilities', [WebFacilitiesController::class, 'index'])->name('facilities');
    Route::post('/facilities-store', [WebFacilitiesController::class, 'store'])->name('facilities.store');
    Route::put('/facilities-hero', [WebFacilitiesController::class, 'update_hero'])->name('facilities.update_hero');
    Route::put('/facilities-update/{id}', [WebFacilitiesController::class, 'update'])->name('facilities.update');
    Route::delete('/facilities-dastroy/{id}', [WebFacilitiesController::class, 'destroy'])->name('facilities.destroy');

    // page vision mission
    Route::get('/vision-mission', [VisionMissionController::class, 'index'])->name('vision-mission');
    Route::put('/vision-mission-update', [VisionMissionController::class, 'update'])->name('vision-mission.update');
    Route::put('/vision-mission-update-hero', [VisionMissionController::class, 'update_hero'])->name('vision-mission.update-hero');

    //page ekskul
    Route::get('/ekskul', [WebHomeController::class, 'ekskul_index'])->name('ekskul');
    Route::post('/ekskul-store', [WebHomeController::class, 'ekskul_store'])->name('ekskul.store');
    Route::put('/ekskul-hero', [WebHomeController::class, 'ekskul_update_hero'])->name('ekskul.update_hero');
    Route::put('/ekskul-update/{id}', [WebHomeController::class, 'ekskul_update'])->name('ekskul.update');
    Route::delete('/ekskul-dastroy/{id}', [WebHomeController::class, 'ekskul_destroy'])->name('ekskul.destroy');

    //page program
    Route::get('/program', [WebHomeController::class, 'program_index'])->name('program');
    Route::post('/program-store', [WebHomeController::class, 'program_store'])->name('program.store');
    Route::put('/program-hero', [WebHomeController::class, 'program_update_hero'])->name('program.update_hero');
    Route::put('/program-update/{id}', [WebHomeController::class, 'program_update'])->name('program.update');
    Route::delete('/program-dastroy/{id}', [WebHomeController::class, 'program_destroy'])->name('program.destroy');

    //page clients
    Route::get('/clients', [ClientsController::class, 'index'])->name('clients');
    Route::post('/clients-s', [ClientsController::class, 'store'])->name('clients.store');
    Route::delete('/clients-d', [ClientsController::class, 'destroy'])->name('clients.destroy');
    Route::put('/clients-u', [ClientsController::class, 'update'])->name('clients.update');

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::put('/settings-umum', [SettingsController::class, 'setting_umum'])->name('settings.umum');
    Route::put('/settings-contact', [SettingsController::class, 'setting_contact'])->name('settings.contact');
    Route::put('/settings-account', [SettingsController::class, 'setting_account'])->name('settings.account');
    Route::put('/settings-pass', [SettingsController::class, 'setting_pass'])->name('settings.pass');
    Route::put('/settings-smtp', [SettingsController::class, 'setting_smtp'])->name('settings.smtp');
    Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
