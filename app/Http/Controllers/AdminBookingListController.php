<?php

namespace App\Http\Controllers;

use App\Models\BookingList;
use App\Models\Reschedule;
use App\Models\Room;
use App\Models\RoomBooking;
use Illuminate\Http\Request;

class AdminBookingListController extends Controller
{
    public function approve(Request $request, $id)
    {
        try {
            $list = BookingList::find($id);
    
            $list->update([
                'status' => 'approved',
            ]);

            $room = Room::find($request->room_id);

            $room->update([
                'status' => 'dipesan'
            ]);

            RoomBooking::create([
                'room_id' => $room->id,
                'user_id' => $list->user_id,
                'booking_id' => $id,
                'date' => $list->date,
                'start' => $list->start,
                'end' => $list->end,
            ]);
    
            return response()->json([
                'success' => true,
                'message' => "Penyewaan disetujui"
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }

    public function reject(Request $request, $id)
    {
        try {
            $list = BookingList::find($id);
    
            $list->update([
                'status' => 'rejected',
            ]);

            Reschedule::create([
                'room_id' => $list->room_id,
                'user_id' => $list->user_id,
                'booking_id' => $id,
                'message' => $request->message,
            ]);
    
            return response()->json([
                'success' => true,
                'message' => "Penyewaan ditolak \n Penawaran Reschedule telah dikirimkan"
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }
}
