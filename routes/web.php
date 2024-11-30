<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\profileController;
use App\Http\Controllers\EmployeeController;

use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("auth.login");
})->middleware("guest");


Route::get("/home", function () {
    return view("index");
})->name('home');

Route::prefix("user")->group(function () {
    Route::get("/register",  [AuthController::class, 'show_register'])->name("show_register")->middleware("auth");
    Route::post("/register",  [AuthController::class, 'register'])->name("register");
    Route::get("/login",  [AuthController::class, 'show_login'])->name("login")->middleware("guest");
    Route::post("/login_store",  [AuthController::class, 'login'])->name("login_store");

    Route::post("/logout",  [AuthController::class, 'logout'])->name("logout");
});


Route::prefix("employees")->name("employee.")->group(function () {

    Route::middleware("auth")->group(function () {
        Route::get("/index",  [EmployeeController::class, 'index'])->name("index");
        Route::get("/create", [EmployeeController::class, 'create'])->name("create");
        Route::post("/store", [EmployeeController::class, 'store'])->name("store");
        // Routes With ID
        Route::get("/edit/{id}", [EmployeeController::class, 'edit'])->name("edit");
        Route::get("/show/{id}", [EmployeeController::class, 'show'])->name("show");
        Route::post("/update/{id}", [EmployeeController::class, 'update'])->name("update");
        Route::get("/destroy/{id}", [EmployeeController::class, 'destroy'])->name("destroy");
    });
});


Route::prefix("profile")->name("profile.")->group(function () {

    Route::get("/", [profileController::class, 'index'])->name("index");
    Route::post("/changeImage", [profileController::class, 'changeImage'])->name("changeImage");
    Route::post("/chagneData", [profileController::class, 'chagneData'])->name("chagneData");
    Route::post("/changePassword", [profileController::class, 'changePassword'])->name("changePassword");
    Route::post("/deleteAccount", [profileController::class, 'deleteAccount'])->name("deleteAccount");

});
