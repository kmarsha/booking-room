<?php

namespace App\Http\Controllers;

use App\Models\BookingList;
use App\Models\RoomBooking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reschedule;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function cancelBooking($id)
    {
        try {
            $bookingList = BookingList::find($id);
            $bookingList->update([
                'status' => 'canceled'
            ]);
            
            $roomBookings = RoomBooking::where('room_id', $bookingList->room_id)
                                                ->where('user_id', $bookingList->user_id)
                                                ->where('date', '=', $bookingList->date)
                                                ->get();

            $roomBooking = $roomBookings[0];
            $roomBooking->delete();

            return response()->json([
                'success' => true,
                'message' => 'Berhasil Membatalkan Penyewaan'
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }

    public function viewReschedule()
    {
        try {
            $reschedules = Reschedule::where('user_id', Auth::user()->id)
                                    ->orderBy('reschedule')->get();

            if (request()->ajax()) {
                return view('booking.load-reschedule', compact('reschedules'));
            }

            return view('booking.reschedule', compact('reschedules'));
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }
    
    public function rescheduleBooking(Request $request, $id)
    {
        try {
            $reschedule = Reschedule::find($id);
            $reschedule->update([
                'reschedule' => $request->reschedule,
            ]);

            if ($request->reschedule == 'yes') {
                $bookingList = BookingList::find($request->booking_id);
                $bookingList->update([
                    'status' => 'rescheduled'
                ]);

                $newBookingList = Bookinglist::create([
                    'room_id' => $bookingList->room_id,
                    'user_id' => $bookingList->user_id,
                    'date' => $bookingList->date,
                    'start' => $bookingList->start,
                    'end' => $bookingList->end,
                    'need' => $bookingList->need,
                    'status' => 'pending'
                ]);

                $booking_id = $newBookingList->id;
            }

            return response()->json([
                'success' => true,
                'message' => "Penjadwalan Ulang dikonfirmasi",
                'url' => "/booking/$booking_id/edit",
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }
}
