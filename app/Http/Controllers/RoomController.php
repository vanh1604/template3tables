<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    //

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required',
            'type' => 'required',
            'status' => 'required',
        ]);

        Room::create([
            'number' => $request->number,
            'type' => $request->type,
            'status' => $request->status,
        ]);
        return redirect('/')->with('messages', 'Room created successfully');
    }
    public function show($id)
    {
        $room = Room::find($id);
        return view('show', compact('room'));
    }
    public function destroy($id)
    {
        $room = Room::find($id);
        $bookings = $room->bookings;
        foreach ($bookings as $booking) {
            $booking->delete();
        }
        $room->delete();
        return redirect('/')->with('messages', 'Room deleted successfully');
    }
}
