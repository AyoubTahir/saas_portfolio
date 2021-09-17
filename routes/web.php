<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\site\HomeController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\site\LanguageController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\HeroSectionController;
use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\FactsSectionController;
use App\Http\Controllers\Admin\ResumesSectionController;
use App\Http\Controllers\Admin\InterestSectionController;
use App\Http\Controllers\Admin\ServicesSectionController;
use App\Http\Controllers\Admin\ExpertisesSectionController;

//site
Route::get('/lang', [LanguageController::class, 'switchLang']);
Route::get('/{username}', [HomeController::class, 'index']);

//admin
Route::prefix('t-admin')->middleware('auth')->group(function () {

    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //home
    Route::get('/hero', [HeroSectionController::class, 'heroSection'])->name('home.hero');
    Route::post('/hero/update', [HeroSectionController::class, 'updateHeroSection'])->name('home.hero.update');

    Route::get('/about', [AboutSectionController::class, 'aboutSection'])->name('home.about');
    Route::post('/about/update', [AboutSectionController::class, 'updateAboutSection'])->name('home.about.update');

    Route::get('/interest', [InterestSectionController::class, 'interestSection'])->name('home.interest');
    Route::post('/interest/update', [InterestSectionController::class, 'updateInterestSection'])->name('home.interest.updatesection');
    Route::post('/interest/store', [InterestSectionController::class, 'storeInterest'])->name('home.interest.store');
    Route::get('/interest/edit/{id}', [InterestSectionController::class, 'editInterest'])->name('home.interest.edit');
    Route::post('/interest/update/{id}', [InterestSectionController::class, 'updateInterest'])->name('home.interest.update');
    Route::post('/interest/delete/{id}', [InterestSectionController::class, 'deleteInterest'])->name('home.interest.delete');
    Route::post('/interest/destroy', [InterestSectionController::class, 'destroyInterest'])->name('home.interest.destroy');

    Route::get('/facts', [FactsSectionController::class, 'factsSection'])->name('home.facts');
    Route::post('/facts/update', [FactsSectionController::class, 'updateFactsSection'])->name('home.facts.updatesection');
    Route::post('/facts/store', [FactsSectionController::class, 'storeFacts'])->name('home.facts.store');
    Route::get('/facts/edit/{id}', [FactsSectionController::class, 'editFacts'])->name('home.facts.edit');
    Route::post('/facts/update/{id}', [FactsSectionController::class, 'updateFacts'])->name('home.facts.update');
    Route::post('/facts/delete/{id}', [FactsSectionController::class, 'deleteFacts'])->name('home.facts.delete');
    Route::post('/facts/destroy', [FactsSectionController::class, 'destroyFacts'])->name('home.facts.destroy');

    Route::get('/services', [ServicesSectionController::class, 'servicesSection'])->name('home.services');
    Route::post('/services/update', [ServicesSectionController::class, 'updateServicesSection'])->name('home.services.updatesection');
    Route::post('/services/store', [ServicesSectionController::class, 'storeServices'])->name('home.services.store');
    Route::get('/services/edit/{id}', [ServicesSectionController::class, 'editServices'])->name('home.services.edit');
    Route::post('/services/update/{id}', [ServicesSectionController::class, 'updateServices'])->name('home.services.update');
    Route::post('/services/delete/{id}', [ServicesSectionController::class, 'deleteServices'])->name('home.services.delete');
    Route::post('/services/destroy', [ServicesSectionController::class, 'destroyServices'])->name('home.services.destroy');

    Route::get('/resumes', [ResumesSectionController::class, 'resumesSection'])->name('home.resumes');
    Route::post('/resumes/update', [ResumesSectionController::class, 'updateResumesSection'])->name('home.resumes.updatesection');
    Route::post('/resumes/store', [ResumesSectionController::class, 'storeResumes'])->name('home.resumes.store');
    Route::get('/resumes/edit/{id}', [ResumesSectionController::class, 'editResumes'])->name('home.resumes.edit');
    Route::post('/resumes/update/{id}', [ResumesSectionController::class, 'updateResumes'])->name('home.resumes.update');
    Route::post('/resumes/delete/{id}', [ResumesSectionController::class, 'deleteResumes'])->name('home.resumes.delete');
    Route::post('/resumes/destroy', [ResumesSectionController::class, 'destroyResumes'])->name('home.resumes.destroy');

    Route::get('/expertises', [ExpertisesSectionController::class, 'expertisesSection'])->name('home.expertises');
    Route::post('/expertises/update', [ExpertisesSectionController::class, 'updateExpertisesSection'])->name('home.expertises.updatesection');
    Route::post('/expertises/store', [ExpertisesSectionController::class, 'storeExpertises'])->name('home.expertises.store');
    Route::get('/expertises/edit/{id}', [ExpertisesSectionController::class, 'editExpertises'])->name('home.expertises.edit');
    Route::post('/expertises/update/{id}', [ExpertisesSectionController::class, 'updateExpertises'])->name('home.expertises.update');
    Route::post('/expertises/delete/{id}', [ExpertisesSectionController::class, 'deleteExpertises'])->name('home.expertises.delete');
    Route::post('/expertises/destroy', [ExpertisesSectionController::class, 'destroyExpertises'])->name('home.expertises.destroy');


    //users
    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UsersController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
    Route::post('/users/update/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::post('/users/delete/{id}', [UsersController::class, 'delete'])->name('users.delete');
    Route::post('/users/destroy', [UsersController::class, 'destroy'])->name('users.destroy');
});

//auth
Route::prefix('t-admin')->group(function () {
    Auth::routes();
});
