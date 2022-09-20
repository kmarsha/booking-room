<?php

namespace App\Http\Controllers;

use App\Models\BookingList;
use App\Models\Room;
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
    
            return response()->json([
                'success' => true,
                'message' => "Berhasil Menyetujui Penyewaan \n Ruangan $room->name dipakai"
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }

    public function reject($id)
    {
        try {
            $list = BookingList::find($id);
    
            $list->update([
                'status' => 'rejected',
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Berhasil Menolak Penyewaan'
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }
}
