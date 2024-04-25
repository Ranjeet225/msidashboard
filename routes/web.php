<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuDetailsController;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get("/service",[HomeController::class,'service'])->name('service');
Route::get("/projects",[HomeController::class,'project'])->name('project');
Route::get("/clients",[HomeController::class,'clients'])->name('clients');
Route::get("/ideology",[HomeController::class,'ideology'])->name('ideology');
Route::get("/teams",[HomeController::class,'teams'])->name('teams');
Route::get("/login",[AdminController::class,'index'])->name('admin');
Route::get("/logoutadmin",[AdminController::class,'logoutadmin'])->name('logoutadmin');
Route::post("adminlogin",[AdminController::class,'adminlogin'])->name('adminlogin');
Route::get("project-details/{id}",[HomeController::class,'ProjectDetails'])->name('project-details');
Route::get("service-details/{id}",[HomeController::class,'ServiceDetails'])->name('service-details');
Route::get("ideology-details/{id}",[HomeController::class,'IdeologyDetails'])->name('ideology-details');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get("/dashboard",[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get("/admin-profile",[AdminController::class,'adminprofile'])->name('admin.admin-profile');
    Route::post("/admin-change-password",[AdminController::class,'adminchangepassword'])->name('admin.admin-change-password');
    Route::post('/create-admin',[AdminController::class,'CreateAdmin'])->name('create-admin');
    Route::get('/edit-admin/{id}',[AdminController::class,'EditAdmin'])->name('edit-admin');
    Route::post("/update-admin",[AdminController::class,'UpdateAdmin'])->name('update-admin');
    Route::get("/admindelete/{id}",[AdminController::class,'admindelete'])->name('admindelete');
    //country

    // home
    Route::get("slider",[DashboardController::class,'getSlider'])->name('getSlider');
    Route::get("create/slider",[DashboardController::class,'createSlider'])->name('create.slider');
    Route::post("store/slider",[DashboardController::class,'storeSlider'])->name('store.slider');
    Route::get("edit/slider/{id}", [DashboardController::class, 'editSlider'])->name('edit.slider');
    Route::get("show/slider/{id}",[DashboardController::class,'showSlider'])->name('show.slider');
    Route::post("update/slider/{id}",[DashboardController::class,'updateSlider'])->name('update.slider');
    Route::get("delete/slider/{id}",[DashboardController::class,'deleteSlider'])->name('delete.slider');
    Route::post("update-slider-status",[DashboardController::class,'updateSliderStatus'])->name('statusUpdate');

    // support
    Route::get("support",[DashboardController::class,'getSupport'])->name('getSupport');
    Route::get("create/support",[DashboardController::class,'createSupport'])->name('create.support');
    Route::post("store/support",[DashboardController::class,'storeSupport'])->name('store.support');
    Route::get("edit/support/{id}", [DashboardController::class, 'editSupport'])->name('edit.support');
    Route::get("show/support/{id}",[DashboardController::class,'showSupport'])->name('show.support');
    Route::post("update/support/{id}",[DashboardController::class,'updateSupport'])->name('update.support');
    Route::get("delete/support/{id}",[DashboardController::class,'deleteSupport'])->name('delete.support');
    // about
    Route::get("about",[DashboardController::class,'getAbout'])->name('getAbout');
    Route::get("create/about",[DashboardController::class,'createAbout'])->name('create.about');
    Route::post("store/about",[DashboardController::class,'storeAbout'])->name('store.about');
    Route::get("edit/about/{id}", [DashboardController::class, 'editAbout'])->name('edit.about');
    Route::post("update/about/{id}",[DashboardController::class,'updateAbout'])->name('update.about');
    Route::get("delete/about/{id}",[DashboardController::class,'deleteAbout'])->name('delete.about');
    // service
    Route::get("service",[DashboardController::class,'getService'])->name('getService');
    Route::get("create/service",[DashboardController::class,'createService'])->name('create.service');
    Route::post("store/service",[DashboardController::class,'storeService'])->name('store.service');
    Route::get("edit/service/{id}", [DashboardController::class, 'editService'])->name('edit.service');
    Route::post("update/service/{id}",[DashboardController::class,'updateService'])->name('update.service');
    Route::get("delete/service/{id}",[DashboardController::class,'deleteService'])->name('delete.service');

      // project
    Route::get("project",[DashboardController::class,'getProject'])->name('getProject');
    Route::get("create/project",[DashboardController::class,'createProject'])->name('create.project');
    Route::post("store/project",[DashboardController::class,'storeProject'])->name('store.project');
    Route::get("edit/project/{id}", [DashboardController::class, 'editProject'])->name('edit.project');
    Route::post("update/project/{id}",[DashboardController::class,'updateProject'])->name('update.project');
    Route::get("delete/project/{id}",[DashboardController::class,'deleteProject'])->name('delete.project');
        // client
    Route::get("client",[DashboardController::class,'getClient'])->name('getClient');
    Route::get("create/client",[DashboardController::class,'createClient'])->name('create.client');
    Route::post("store/client",[DashboardController::class,'storeClient'])->name('store.client');
    Route::get("edit/client/{id}", [DashboardController::class, 'editClient'])->name('edit.client');
    Route::post("update/client/{id}",[DashboardController::class,'updateClient'])->name('update.client');
    Route::get("delete/client/{id}",[DashboardController::class,'deleteClient'])->name('delete.client');
    //testimonial
    Route::get("testimonials",[DashboardController::class,'getTestimonials'])->name('getTestimonials');
    Route::get("create/testimonials",[DashboardController::class,'createTestimonials'])->name('create.testimonial');
    Route::post("testimonials/store",[DashboardController::class,'storeTestimonials'])->name('store.testimonial');
    Route::get("edit/testimonials/{id}",[DashboardController::class,'editTestimonials'])->name('edit.testimonial');
    Route::get("show/testimonials/{id}",[DashboardController::class,'showTestimonials'])->name('show.testimonial');
    Route::post("update/testimonials/{id}",[DashboardController::class,'updateTestimonials'])->name('update.testimonial');
    Route::get("delete/testimonials/{id}",[DashboardController::class,'deleteTestimonials'])->name('delete.testimonial');

    // gallery
    Route::get("gallery",[DashboardController::class,'getGallery'])->name('getGallery');
    Route::get("create/gallery",[DashboardController::class,'createGallery'])->name('create.gallery');
    Route::post("gallery/store",[DashboardController::class,'storeGallery'])->name('store.gallery');
    Route::get("edit/gallery/{id}",[DashboardController::class,'editGallery'])->name('edit.gallery');
    Route::get("show/gallery/{id}",[DashboardController::class,'showGallery'])->name('show.gallery');
    Route::post("update/gallery/{id}",[DashboardController::class,'updateGallery'])->name('update.gallery');
    Route::get("delete/gallery/{id}",[DashboardController::class,'deleteGallery'])->name('delete.gallery');

    // carrier
    Route::get("carrier",[DashboardController::class,'getCarrier'])->name('getCarrier');
    Route::get("create/carrier",[DashboardController::class,'createCarrier'])->name('create.carrier');
    Route::post("carrier/store",[DashboardController::class,'storeCarrier'])->name('store.carrier');
    Route::get("edit/carrier/{id}",[DashboardController::class,'editCarrier'])->name('edit.carrier');
    Route::get("show/carrier/{id}",[DashboardController::class,'showCarrier'])->name('show.carrier');
    Route::post("update/carrier/{id}",[DashboardController::class,'updateCarrier'])->name('update.carrier');
    Route::get("delete/carrier/{id}",[DashboardController::class,'deleteCarrier'])->name('delete.carrier');

    // Teams
    Route::get("teams",[DashboardController::class,'getTeams'])->name('getTeams');
    Route::get("create/teams",[DashboardController::class,'createTeams'])->name('create.teams');
    Route::post("teams/store",[DashboardController::class,'storeTeams'])->name('store.teams');
    Route::get("edit/teams/{id}",[DashboardController::class,'editTeams'])->name('edit.teams');
    Route::get("show/teams/{id}",[DashboardController::class,'showTeams'])->name('show.teams');
    Route::post("update/teams/{id}",[DashboardController::class,'updateTeams'])->name('update.teams');
    Route::get("delete/teams/{id}",[DashboardController::class,'deleteTeams'])->name('delete.teams');

    // success
    Route::get("success",[DashboardController::class,'getSuccess'])->name('getSuccess');
    Route::get("create/success",[DashboardController::class,'createSuccess'])->name('create.success');
    Route::post("success/store",[DashboardController::class,'storeSuccess'])->name('store.success');
    Route::get("edit/success/{id}",[DashboardController::class,'editSuccess'])->name('edit.success');
    Route::get("show/success/{id}",[DashboardController::class,'showSuccess'])->name('show.success');
    Route::post("update/success/{id}",[DashboardController::class,'updateSuccess'])->name('update.success');
    Route::get("delete/success/{id}",[DashboardController::class,'deleteSuccess'])->name('delete.success');

    // service Details
    Route::get("service-details",[MenuDetailsController::class,'getServiceDetails'])->name('getServiceDetails');
    Route::get("create/service-details",[MenuDetailsController::class,'createServiceDetails'])->name('create.service-details');
    Route::post("service-details/store",[MenuDetailsController::class,'storeServiceDetails'])->name('store.service-details');
    Route::get("edit/service-details/{id}",[MenuDetailsController::class,'editServiceDetails'])->name('edit.service-details');
    Route::get("show/service-details/{id}",[MenuDetailsController::class,'showServiceDetails'])->name('show.service-details');
    Route::post("update/service-details/{id}",[MenuDetailsController::class,'updateServiceDetails'])->name('update.service-details');
    Route::get("delete/service-details/{id}",[MenuDetailsController::class,'deleteServiceDetails'])->name('delete.service-details');
    // project Details
    Route::get("project-details",[MenuDetailsController::class,'getProjectDetails'])->name('getProjectDetails');
    Route::get("create/project-details",[MenuDetailsController::class,'createProjectDetails'])->name('create.project-details');
    Route::post("project-details/store",[MenuDetailsController::class,'storeProjectDetails'])->name('store.project-details');
    Route::get("edit/project-details/{id}",[MenuDetailsController::class,'editProjectDetails'])->name('edit.project-details');
    Route::get("show/project-details/{id}",[MenuDetailsController::class,'showProjectDetails'])->name('show.project-details');
    Route::post("update/project-details/{id}",[MenuDetailsController::class,'updateProjectDetails'])->name('update.project-details');
    Route::get("delete/project-details/{id}",[MenuDetailsController::class,'deleteProjectDetails'])->name('delete.project-details');

    // ideology
    Route::get("ideology",[DashboardController::class,'getIdeology'])->name('getIdeology');
    Route::get("create/ideology",[DashboardController::class,'createIdeology'])->name('create.ideology');
    Route::post("store/ideology",[DashboardController::class,'storeIdeology'])->name('store.ideology');
    Route::get("edit/ideology/{id}", [DashboardController::class, 'editIdeology'])->name('edit.ideology');
    Route::post("update/ideology/{id}",[DashboardController::class,'updateIdeology'])->name('update.ideology');
    Route::get("delete/ideology/{id}",[DashboardController::class,'deleteIdeology'])->name('delete.ideology');

    // ideology details

    Route::get("ideology-details",[MenuDetailsController::class,'getIdeologyDetails'])->name('getIdeologyDetails');
    Route::get("create/ideology-details",[MenuDetailsController::class,'createIdeologyDetails'])->name('create.ideology-details');
    Route::post("ideology-details/store",[MenuDetailsController::class,'storeIdeologyDetails'])->name('store.ideology-details');
    Route::get("edit/ideology-details/{id}",[MenuDetailsController::class,'editIdeologyDetails'])->name('edit.ideology-details');
    Route::get("show/ideology-details/{id}",[MenuDetailsController::class,'showIdeologyDetails'])->name('show.ideology-details');
    Route::post("update/ideology-details/{id}",[MenuDetailsController::class,'updateIdeologyDetails'])->name('update.ideology-details');
    Route::get("delete/ideology-details/{id}",[MenuDetailsController::class,'deleteIdeologyDetails'])->name('delete.ideology-details');

});


Route::fallback(function () {
    return view('errors.404');
});
