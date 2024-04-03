<?php

use App\Http\Controllers\RoomController;
use App\Models\Room;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $rooms = Room::paginate(3);
    return view('welcome', compact("rooms"));
});
Route::resource("rooms", RoomController::class);
