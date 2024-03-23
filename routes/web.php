<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/logout",[UserController::class,"logout"]);
Route::get("/admin_dashboard", [PostController::class, "admin_dashboard"]);
Route::get("/property-list/{id}", [PostController::class, "propertylist"]);
Route::get("/property-detail/{id}", [PostController::class, "propertydetail"]);
Route::get("/search", [PostController::class, "search"]);
Route::get("/contact", [PostController::class, "contact"]);
Route::post("/sendcontact", [PostController::class, "sendcontact"]);
Route::get("/user_message", [PostController::class, "user_message"]);
Route::get("/view_message/{id}", [PostController::class, "view_message"]);
Route::get("/delete_message/{id}", [PostController::class, "delete_message"]);
Route::get("/about", [PostController::class, "about"]);




Route::get("/user_login", [UserController::class, "user_login"]);
Route::post("/send_user_login", [UserController::class, "send_user_login"]);
Route::get("/create_user", [UserController::class, "create_user"]);
Route::post("/register_user", [UserController::class, "register_user"]);
Route::get("/view_all_user", [UserController::class, "view_all_user"]);
Route::get("/edit_user/{id}", [UserController::class, "edit_user"]);
Route::post("/update_user", [UserController::class, "update_user"]);
Route::get("/delete_user/{id}", [UserController::class, "delete_user"]);

// Route::get("/view_all_property", [PostController::class, "view_all_property"]);

Route::get("/create_property", [PostController::class, "create_property"]);
Route::post("/send_property", [PostController::class, "send_property"]);
Route::get("/edit_property/{id}", [PostController::class, "edit_property"]);
Route::post("/update_property", [PostController::class, "update_property"]);
Route::get("/view_all_property", [PostController::class, "view_all_property"]);
Route::get("/delete_property/{id}", [PostController::class, "delete_property"]);




Route::get("/create_propertytype", [PostController::class, "create_propertytype"]);
Route::post("/register_propertytype", [PostController::class, "register_propertytype"]);
Route::get("/edit_propertytype/{id}", [PostController::class, "edit_propertytype"]);
Route::post("/update_propertytype", [PostController::class, "update_propertytype"]);
Route::get("/delete_propertytype/{id}", [PostController::class, "delete_propertytype"]);
Route::get("/view_all_propertytype", [PostController::class, "view_all_propertytype"]);

Route::get("/",[PostController::class,"index"]);
