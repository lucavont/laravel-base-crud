<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Booking;

use Illuminate\Support\Facades\DB;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->q;
        if ($q) {
            $bookings = Booking::where('guest_full_name', 'LIKE', "%$q%")->get();
        } else {
            $bookings = Booking::all();
        }
        

        $columns = [
            'id' => '#',
            'guest_full_name' => 'Nome e Cognome',
            'room' => 'Stanza',
            'from_date' => 'Dal giorno',
            'to_date' => 'Al giorno'
        ];

        return view('bookings.index', compact(['bookings', 'columns']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('bookings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $newBooking = new Booking();

        $newBooking->guest_full_name = $request->input('booking_name');
        $newBooking->guest_credit_card = $request->input('booking_credit_card');
        $newBooking->room = $request->input('booking_room');
        $newBooking->from_date = $request->input('booking_from');
        $newBooking->to_date = $request->input('booking_to');
        $newBooking->more_details = $request->input('booking_more_details');

        $newBooking->save();

        return view('bookings.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $booking = Booking::find($id);

        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
