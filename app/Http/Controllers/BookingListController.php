<?php

namespace App\Http\Controllers;

use App\Models\BookingList;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::where('status', 'able')->get();

        return view('booking.form', compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BookingList::create([
            'user_id' => Auth::user()->id,
            'room_id' => $request->room_id,
            'date' => $request->date,
            'start' => $request->start,
            'end' => $request->end,
            'need' => $request->need,
            'status' => 'pending',
        ]);

        return redirect()->route('book-list')->with('success', 'Berhasil Booking Ruangan \n Mohon Tunggu Konfirmasi dari Admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookingList  $bookingList
     * @return \Illuminate\Http\Response
     */
    public function show(BookingList $bookingList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookingList  $bookingList
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rooms = Room::all();
        $bookingList = BookingList::find($id);

        return view('booking.form', compact('bookingList', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookingList  $bookingList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bookingList = BookingList::find($id);

        $bookingList->update([
            'date' => $request->date,
            'start' => $request->start,
            'end' => $request->end,
            'need' => $request->need,
            'status' => 'pending',
        ]);

        return redirect()->route('book-list')->with('success', 'Berhasil Edit Data Booking');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookingList  $bookingList
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingList $bookingList)
    {
    }
}
