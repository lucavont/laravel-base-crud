<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Booking;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\BookingsFormRequest;
use Carbon\Carbon;

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
    public function store(BookingsFormRequest $request)
    {
        //
        $validated = $request->validated();        

        $newBooking = new Booking();

        $newBooking->guest_full_name = $validated['booking_name'];
        $newBooking->guest_credit_card = $validated['booking_credit_card'];
        $newBooking->room = $validated['booking_room'];
        $newBooking->from_date = $validated['booking_from'];
        $newBooking->to_date = $validated['booking_to'];
        $newBooking->more_details = $validated['booking_more_details'];

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
        $booking = Booking::find($id);

        $fromDate = Carbon::createFromFormat('d/m/Y', $booking->from_date)->toDateString();
        $toDate = Carbon::createFromFormat('d/m/Y', $booking->to_date)->toDateString();

        $booking->from_date = $fromDate;
        $booking->to_date = $toDate;
    

        return view('bookings.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookingsFormRequest $request, $id)
    {
        //
        $validated = $request->validated();

        $oldBooking = Booking::find($id);

        $oldBooking->guest_full_name = $validated['booking_name'];
        $oldBooking->guest_credit_card = $validated['booking_credit_card'];
        $oldBooking->room = $validated['booking_room'];
        $oldBooking->from_date = $validated['booking_from'];
        $oldBooking->to_date = $validated['booking_to'];
        $oldBooking->more_details = $validated['booking_more_details'];

        $oldBooking->save();

        return redirect()->route('bookings.index');

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
