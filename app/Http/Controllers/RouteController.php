<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\BookingList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
    public function viewDashboard()
    {
        if (Auth::user()->role == 'admin') {
            $data = [
                'pending' => BookingList::whereStatus('pending')->get()->count(),
                'approved' => BookingList::whereStatus('approved')->get()->count(),
                'rejected' => BookingList::whereStatus('rejected')->get()->count(),
                'used' => BookingList::whereStatus('used')->get()->count(),
                'canceled' => BookingList::whereStatus('canceled')->get()->count(),
                'done' => BookingList::whereStatus('done')->get()->count(),
                'expired' => BookingList::whereStatus('expired')->get()->count(),
                'total' => BookingList::all()->count(),
                'room' => Room::all()->count(),
                'user' => User::all()->count(),
            ];
        } elseif (Auth::user()->role == 'user') {
            $data = [
                'today' => BookingList::where('user_id', Auth::user()->id)->where('date', '=', now()->format('Y-m-d'))->get()->count(),
                'myList' => BookingList::where('user_id', Auth::user()->id)->get()->count(),
                'today_lists' => BookingList::where('user_id', Auth::user()->id)->whereStatus('approved')->where('date', '=', now()->format('Y-m-d'))->get(),
            ];
        }
        return view('dashboard', $data);
    }

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
