<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookTypeController;
Route::get("/",function(){
    return view("welcome");
});

Route::get("/dashboard",function(){
    return view("dashboard");
});

http://localhost:8000/api/users

Route::get("/homepage",[HomeController::class,"index"]);
Route::get("/create",[HomeController::class,"create"]);

Route::resource("/books",BookController::class);
Route::resource("/book_types",BookTypeController::class);


// Route::get("/books",[BookController::class,"index"]);
// Route::get("/books/create",[BookController::class,"create"]);
// Route::post("/books",[BookController::class,"store"]);
// Route::get("/books/{id}",[BookController::class,"show"]);
// Route::get("/books/{id}/edit",[BookController::class,"edit"]);
// Route::put("/books/{id}",[BookController::class,"update"]);
// Route::delete("/books/{id}",[BookController::class,"destroy"]);


Route::get("/login",[AuthController::class,"login"])->name("login");
Route::get("/l",[AuthController::class,"login"])->name("l");