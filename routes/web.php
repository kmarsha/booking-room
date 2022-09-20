<?php

use App\Http\Controllers\AdminBookingListController;
use App\Http\Controllers\BookingListController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('dashboard', 'dashboard')->name('dashboard');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::middleware('isAdmin')->prefix('admin')->group(function() {
        Route::resource('room', RoomController::class);
        Route::resource('user', UserController::class);

        Route::get('booking-list', [RouteController::class, 'viewBookList'])->name('admin-booking-list');
        Route::get('booking/approved/{id}', [AdminBookingListController::class, 'approve'])->name('approve-booking');
        Route::get('booking/rejected/{id}', [AdminBookingListController::class, 'reject'])->name('reject-booking');
    });

    Route::get('room', [RouteController::class, 'viewRoom'])->name('view-room');

    Route::resource('booking', BookingListController::class);
    Route::get('my-booking-list', [RouteController::class, 'viewBookList'])->name('book-list');

    Route::get('cancel-booking/{id}', function($id) {
        try {
            $bookingList = App\Models\BookingList::find($id);
            $bookingList->update([
                'status' => 'canceled'
            ]);

            $room = App\Models\Room::find($bookingList->room_id);
            $room->update([
                'status' => 'tersedia'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Berhasil Membatalkan Penyewaan'
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    })->name('cancel.booking');
});