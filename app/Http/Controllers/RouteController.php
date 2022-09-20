<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\BookingList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
    public function viewRoom()
    {
        try {
            $rooms = Room::all();

            if (request()->ajax()) {
                return view('room.load', compact('rooms'));
            }

            return view('room.index', compact('rooms'));
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }

    public function viewBookList()
    {
        try {
            if (Auth::user()->role == 'admin') {
                $lists = BookingList::all();
            } elseif (Auth::user()->role == 'user') {
                $user_id = Auth::user()->id;
                $lists = BookingList::where('user_id', $user_id)->get();
            }
            
            if (request()->ajax()) {
                return view('load-booking', compact('lists'));
            }

            return view('booking-list', compact('lists'));
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }
}
