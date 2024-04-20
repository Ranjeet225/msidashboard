<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;


Route::prefix('v1')->group(function () {
    Route::get("roleslist",[ApiController::class,'roleslist']);
    Route::post("login",[ApiController::class,'login']);
    Route::post("register",[ApiController::class,'register']);
    Route::post("ownerregester",[ApiController::class,'ownerregester']);
    Route::get("profiledetails/{any}",[ApiController::class,'profiledetails']);
    Route::get("/countries",[ApiController::class,'countries']);
    Route::get("/statelist/{countryid}",[ApiController::class,'statelist']);
    Route::get("/citylist/{stateid}",[ApiController::class,'citylist']);
    Route::get("/propertytype",[ApiController::class,'propertytype']);
    Route::get("/apartmentstype/{any}",[ApiController::class,'apartmentstype']);
    Route::get("/wherelistproperty",[ApiController::class,'wherelistproperty']);
    Route::post("/cerateproperty",[ApiController::class,'cerateproperty']);
    Route::post("/verifimail",[ApiController::class,'verifimail']);
    Route::get('/property-checklist/{id}',[ApiController::class,'propertychecklist']);
    Route::get('/property-outdoor-features/{id}',[ApiController::class,'propertyoutdoorfeatures']);
    Route::get('/nearby',[Apicontroller::class,'nearby']);
    Route::get('/propertyslist',[ApiController::class,'propertyslist']);
});