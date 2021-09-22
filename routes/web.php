<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\site\HomeController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\site\LanguageController;
use App\Http\Controllers\site\ProjectsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\HeroSectionController;
use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\FactsSectionController;
use App\Http\Controllers\Admin\ResumesSectionController;
use App\Http\Controllers\Admin\InterestSectionController;
use App\Http\Controllers\Admin\ServicesSectionController;
use App\Http\Controllers\Admin\PortfolioSectionController;
use App\Http\Controllers\Admin\ExpertisesSectionController;

//site
Route::get('/lang', [LanguageController::class, 'switchLang']);
Route::get('/{username}', [HomeController::class, 'index'])->name('site.home');
Route::get('/{username}/projects', [ProjectsController::class, 'index'])->name('site.porojects');
Route::get('/{username}/projects/{id}', [ProjectsController::class, 'show'])->name('site.porojects.show');
Route::post('/message/store/{user_id}', [MessageController::class, 'store'])->name('message.store');
//admin
Route::prefix('t-admin')->group(function () {

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
    Route::get('/expertises/show/{id}', [ExpertisesSectionController::class, 'showExpertises'])->name('home.expertises.show');
    Route::get('/expertises/edit/{id}', [ExpertisesSectionController::class, 'editExpertises'])->name('home.expertises.edit');
    Route::post('/expertises/update/{id}', [ExpertisesSectionController::class, 'updateExpertises'])->name('home.expertises.update');
    Route::post('/expertises/delete/{id}', [ExpertisesSectionController::class, 'deleteExpertises'])->name('home.expertises.delete');
    Route::post('/expertises/destroy', [ExpertisesSectionController::class, 'destroyExpertises'])->name('home.expertises.destroy');

    Route::post('/expertises/skills/store', [ExpertisesSectionController::class, 'storeSkillExpertises'])->name('home.skills.store');
    Route::get('/expertises/skills/edit/{id}', [ExpertisesSectionController::class, 'editSkillExpertises'])->name('home.skills.edit');
    Route::post('/expertises/skills/update/{id}', [ExpertisesSectionController::class, 'updateSkillExpertises'])->name('home.skills.update');
    Route::post('/expertises/skills/delete/{id}', [ExpertisesSectionController::class, 'deleteSkillExpertises'])->name('home.skills.delete');
    Route::post('/expertises/skills/destroy', [ExpertisesSectionController::class, 'destroySkillExpertises'])->name('home.skills.destroy');

    Route::get('/portfolio', [PortfolioSectionController::class, 'portfolioSection'])->name('portfolio.index');
    Route::post('/portfolio/update', [PortfolioSectionController::class, 'updatePortfolioSection'])->name('portfolio.updatesection');

    //categories
    Route::get('/portfolio/categories', [CategoryController::class, 'index'])->name('portfolio.categories.index');
    Route::post('/portfolio/categories/store', [CategoryController::class, 'store'])->name('portfolio.categories.store');
    Route::get('/portfolio/categories/edit/{id}', [CategoryController::class, 'edit'])->name('portfolio.categories.edit');
    Route::post('/portfolio/categories/update/{id}', [CategoryController::class, 'update'])->name('portfolio.categories.update');
    Route::post('/portfolio/categories/delete/{id}', [CategoryController::class, 'delete'])->name('portfolio.categories.delete');
    Route::post('/portfolio/categories/destroy', [CategoryController::class, 'destroy'])->name('portfolio.categories.destroy');

    //projects
    Route::get('/portfolio/projects', [ProjectController::class, 'index'])->name('portfolio.projects.index');
    Route::get('/portfolio/projects/create', [ProjectController::class, 'create'])->name('portfolio.projects.create');
    Route::post('/portfolio/projects/store', [ProjectController::class, 'store'])->name('portfolio.projects.store');
    Route::get('/portfolio/projects/edit/{id}', [ProjectController::class, 'edit'])->name('portfolio.projects.edit');
    Route::post('/portfolio/projects/update/{id}', [ProjectController::class, 'update'])->name('portfolio.projects.update');
    Route::post('/portfolio/projects/delete/{id}', [ProjectController::class, 'delete'])->name('portfolio.projects.delete');
    Route::post('/portfolio/projects/destroy', [ProjectController::class, 'destroy'])->name('portfolio.projects.destroy');

    Route::post('/portfolio/projects/images/store/{id}', [ProjectController::class, 'storeImages'])->name('portfolio.projects.images.store');
    Route::post('/portfolio/projects/{pid}/images/delete/{id}', [ProjectController::class, 'deleteImages'])->name('portfolio.projects.images.delete');
    Route::post('/portfolio/projects/{pid}/images/destroy', [ProjectController::class, 'destroyImages'])->name('portfolio.projects.images.destroy');

    //settings
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings/update', [SettingsController::class, 'update'])->name('settings.update');

    //contact
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact/update', [ContactController::class, 'update'])->name('contact.update');

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
