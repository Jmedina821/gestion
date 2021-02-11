<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\BudgetSourceController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\InvestmentAreaController;
use App\Http\Controllers\MeasurementController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\ParroquiaController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectStatusController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ScopeController;
use App\Http\Controllers\SectorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('institutions-filtered', [InstitutionController::class, 'filtered']);

Route::resource('institution', InstitutionController::class);
Route::resource('activity', ActivityController::class);
Route::resource('budget', BudgetController::class);
Route::resource('budget-source', BudgetSourceController::class);
Route::resource('investment-area', InvestmentAreaController::class);
Route::resource('measurement', MeasurementController::class);
Route::resource('module', ModuleController::class);
Route::resource('municipio', MunicipioController::class);
Route::resource('parroquia', ParroquiaController::class);
Route::resource('program', ProgramController::class);
Route::resource('project', ProjectController::class);
Route::resource('project-status', ProjectStatusController::class);
Route::resource('role', RoleController::class);
Route::resource('scope', ScopeController::class);
Route::resource('sector', SectorController::class);
