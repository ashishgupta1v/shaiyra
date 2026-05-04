<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Phase1\AuthController;
use App\Http\Controllers\Phase1_Foundation\FamilyController;
use App\Http\Controllers\Phase1_Foundation\SettingsController;
use App\Http\Controllers\Phase2_Narrative\FeedController;
use App\Http\Controllers\Phase2_Narrative\MilestoneController;
use App\Http\Controllers\Phase2_Narrative\PhotoController;
use App\Http\Controllers\Phase2_Narrative\PublicProfileController;
use App\Http\Controllers\Phase3_PrivateVault\ArchiveController as PrivateArchiveController;
use App\Http\Controllers\Phase3_PrivateVault\FamilyTreeController;
use App\Http\Controllers\Phase3_PrivateVault\GrowthController;
use App\Http\Controllers\Phase3_PrivateVault\WellnessController;
use App\Http\Controllers\Phase4_Legacy\ArchiveController as LegacyArchiveController;
use App\Http\Controllers\Phase4_Legacy\ExportController;
use App\Http\Controllers\Phase4_Legacy\LegacySettingsController;
use App\Http\Controllers\Phase4_Legacy\LettersController;
use App\Http\Controllers\Phase4_Legacy\ProfessionalController;
use Illuminate\Support\Facades\Route;

// API Version 1
Route::prefix('v1')->group(function () {

    // ============================================
    // PHASE 1: Foundation & Shell - Authentication
    // ============================================
    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('register', [AuthController::class, 'register']);
        Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
        Route::get('me', [AuthController::class, 'me'])->middleware('auth:sanctum');
        Route::post('refresh', [AuthController::class, 'refresh'])->middleware('auth:sanctum');
    });

    // ============================================
    // PHASE 1: Foundation & Shell - Family Setup
    // ============================================
    Route::middleware('auth:sanctum')->prefix('family')->group(function () {
        Route::get('/', [FamilyController::class, 'index']);
        Route::post('setup', [FamilyController::class, 'setup']);
        Route::get('members', [FamilyController::class, 'getMembers']);
        Route::post('members', [FamilyController::class, 'addMember']);
        Route::put('members/{id}', [FamilyController::class, 'updateMember']);
        Route::delete('members/{id}', [FamilyController::class, 'removeMember']);
        Route::get('roles', [FamilyController::class, 'getRoles']);
    });

    // ============================================
    // PHASE 1: Foundation & Shell - Settings
    // ============================================
    Route::middleware('auth:sanctum')->prefix('settings')->group(function () {
        Route::get('/', [SettingsController::class, 'index']);
        Route::put('/', [SettingsController::class, 'update']);
        Route::put('profile', [SettingsController::class, 'updateProfile']);
        Route::post('change-password', [SettingsController::class, 'changePassword']);
        Route::post('enable-2fa', [SettingsController::class, 'enableTwoFactor']);
    });

    // ============================================
    // PHASE 2: Public Narrative - Milestones
    // ============================================
    Route::prefix('milestones')->group(function () {
        Route::get('/', [MilestoneController::class, 'index']);
        Route::get('{id}', [MilestoneController::class, 'show']);
        Route::post('/', [MilestoneController::class, 'store'])->middleware('auth:sanctum');
        Route::put('{id}', [MilestoneController::class, 'update'])->middleware('auth:sanctum');
        Route::delete('{id}', [MilestoneController::class, 'destroy'])->middleware('auth:sanctum');
    });

    // ============================================
    // PHASE 2: Public Narrative - Photos
    // ============================================
    Route::prefix('photos')->group(function () {
        Route::get('/', [PhotoController::class, 'index']);
        Route::get('{id}', [PhotoController::class, 'show']);
        Route::post('/', [PhotoController::class, 'upload'])->middleware('auth:sanctum');
        Route::put('{id}', [PhotoController::class, 'update'])->middleware('auth:sanctum');
        Route::delete('{id}', [PhotoController::class, 'destroy'])->middleware('auth:sanctum');
    });

    // ============================================
    // PHASE 2: Public Narrative - Feed
    // ============================================
    Route::prefix('feed')->group(function () {
        Route::get('/', [FeedController::class, 'index']);
        Route::get('by-category/{category}', [FeedController::class, 'byCategory']);
        Route::get('search', [FeedController::class, 'search']);
    });

    // ============================================
    // PHASE 2: Public Narrative - Public Profile
    // ============================================
    Route::prefix('public')->group(function () {
        Route::get('profile', [PublicProfileController::class, 'index']);
        Route::get('favorites', [PublicProfileController::class, 'favorites']);
        Route::post('share', [PublicProfileController::class, 'createShare'])->middleware('auth:sanctum');
        Route::post('share/{token}/validate', [PublicProfileController::class, 'validateShare']);
    });

    // ============================================
    // PHASE 3: Private Vault - Archive
    // ============================================
    Route::middleware('auth:sanctum')->prefix('archive')->group(function () {
        Route::get('/', [PrivateArchiveController::class, 'index']);
        Route::get('{id}', [PrivateArchiveController::class, 'show']);
        Route::post('/', [PrivateArchiveController::class, 'store']);
        Route::put('{id}', [PrivateArchiveController::class, 'update']);
        Route::delete('{id}', [PrivateArchiveController::class, 'destroy']);
        Route::get('{id}/items', [PrivateArchiveController::class, 'getItems']);
    });

    // ============================================
    // PHASE 3: Private Vault - Family Tree
    // ============================================
    Route::middleware('auth:sanctum')->prefix('family-tree')->group(function () {
        Route::get('/', [FamilyTreeController::class, 'index']);
        Route::post('/', [FamilyTreeController::class, 'store']);
        Route::put('{id}', [FamilyTreeController::class, 'update']);
        Route::delete('{id}', [FamilyTreeController::class, 'destroy']);
        Route::get('search', [FamilyTreeController::class, 'search']);
    });

    // ============================================
    // PHASE 3: Private Vault - Growth Tracker
    // ============================================
    Route::middleware('auth:sanctum')->prefix('growth')->group(function () {
        Route::get('/', [GrowthController::class, 'index']);
        Route::get('milestones', [GrowthController::class, 'getMilestones']);
        Route::post('milestone', [GrowthController::class, 'recordMilestone']);
        Route::get('charts', [GrowthController::class, 'getCharts']);
        Route::get('timeline', [GrowthController::class, 'getTimeline']);
        Route::put('milestone/{id}', [GrowthController::class, 'updateMilestone']);
        Route::delete('milestone/{id}', [GrowthController::class, 'deleteMilestone']);
    });

    // ============================================
    // PHASE 3: Private Vault - Wellness
    // ============================================
    Route::middleware('auth:sanctum')->prefix('wellness')->group(function () {
        Route::get('/', [WellnessController::class, 'index']);
        Route::post('record', [WellnessController::class, 'recordData']);
        Route::get('records', [WellnessController::class, 'getRecords']);
        Route::get('dashboard', [WellnessController::class, 'getDashboard']);
        Route::get('insights', [WellnessController::class, 'getInsights']);
        Route::put('record/{id}', [WellnessController::class, 'updateRecord']);
        Route::delete('record/{id}', [WellnessController::class, 'deleteRecord']);
    });

    // ============================================
    // PHASE 4: Legacy & Transition - Archive
    // ============================================
    Route::middleware('auth:sanctum')->prefix('legacy/archive')->group(function () {
        Route::get('/', [LegacyArchiveController::class, 'index']);
        Route::post('/', [LegacyArchiveController::class, 'store']);
        Route::get('{id}', [LegacyArchiveController::class, 'show']);
        Route::put('{id}', [LegacyArchiveController::class, 'update']);
        Route::post('{id}/verify', [LegacyArchiveController::class, 'verify']);
    });

    // ============================================
    // PHASE 4: Legacy & Transition - Letters
    // ============================================
    Route::middleware('auth:sanctum')->prefix('legacy/letters')->group(function () {
        Route::get('/', [LettersController::class, 'index']);
        Route::post('/', [LettersController::class, 'store']);
        Route::get('{id}', [LettersController::class, 'show']);
        Route::put('{id}', [LettersController::class, 'update']);
        Route::delete('{id}', [LettersController::class, 'destroy']);
        Route::post('{id}/encrypt', [LettersController::class, 'encrypt']);
    });

    // ============================================
    // PHASE 4: Legacy & Transition - Professional
    // ============================================
    Route::middleware('auth:sanctum')->prefix('legacy/professional')->group(function () {
        Route::get('/', [ProfessionalController::class, 'index']);
        Route::post('/', [ProfessionalController::class, 'store']);
        Route::get('{id}', [ProfessionalController::class, 'show']);
        Route::put('{id}', [ProfessionalController::class, 'update']);
        Route::delete('{id}', [ProfessionalController::class, 'destroy']);
    });

    // ============================================
    // PHASE 4: Legacy & Transition - Export
    // ============================================
    Route::middleware('auth:sanctum')->prefix('legacy/export')->group(function () {
        Route::post('/', [ExportController::class, 'generate']);
        Route::get('status/{jobId}', [ExportController::class, 'getStatus']);
        Route::get('download/{jobId}', [ExportController::class, 'download']);
        Route::get('formats', [ExportController::class, 'getAvailableFormats']);
    });

    // ============================================
    // PHASE 4: Legacy & Transition - Legacy Settings
    // ============================================
    Route::middleware('auth:sanctum')->prefix('legacy/settings')->group(function () {
        Route::get('/', [LegacySettingsController::class, 'index']);
        Route::put('/', [LegacySettingsController::class, 'update']);
        Route::post('executor', [LegacySettingsController::class, 'setExecutor']);
        Route::post('time-lock', [LegacySettingsController::class, 'setTimeLock']);
        Route::get('access-plan', [LegacySettingsController::class, 'getAccessPlan']);
    });

    // ============================================
    // Common - Notifications
    // ============================================
    Route::middleware('auth:sanctum')->prefix('notifications')->group(function () {
        Route::get('/', [NotificationController::class, 'index']);
        Route::post('{id}/read', [NotificationController::class, 'markAsRead']);
        Route::delete('{id}', [NotificationController::class, 'destroy']);
    });

});

// Health check endpoint (no auth required)
Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});
