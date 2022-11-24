<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('room.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName = str_replace(' ', '_', strtolower($request->name)) . '.' . $request->file('photo')->extension();
        $request->file('photo')->storeAs('public/room', $fileName);

        $photo = 'storage/room/' . $fileName;

        Room::create([
            'name' => $request->name,
            'description' => $request->description,
            'capacity' => $request->capacity,
            'photo' => $photo,
            'status' => $request->status,
        ]);

        return redirect(route('room.index'))->with('success', 'Berhasil Menyimpan Data Ruangan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('room.form', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $room->update([
            'name' => $request->name,
            'description' => $request->description,
            'capacity' => $request->capacity,
            'status' => $request->status,
        ]);

        if ($request->file('photo')) {
            $fileName = str_replace(' ', '_', strtolower($request->name)) . '.' . $request->file('photo')->extension();
            $request->file('photo')->storeAs('public/room', $fileName);

            $photo = 'storage/room/' . $fileName;

            $room->update([
                'photo' => $photo,
            ]);
        }
        return redirect(route('room.index'))->with('success', 'Berhasil Memperbarui Data Ruangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        try {
            $room->delete();

            $msg = 'Berhasil Menghapus Data Ruangan';

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => $msg,
                ]);
            }

            return redirect(route('room.index'))->with('success', $msg);
        } catch (\Throwable $th) {
            // throw $th->getMessage();
            return $th->getMessage();
        }
    }
}
