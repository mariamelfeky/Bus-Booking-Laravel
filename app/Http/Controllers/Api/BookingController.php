<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\Booking;
use App\Http\Requests\Api\BookingRequest;



class BookingController extends ApiController
{

    use Booking;

    public function __construct()
    {
        $this->middleware('auth:api');
    }


    /**
     * Get available seats number to the specified resource from storage.
     *
     * @param  TripRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function available(BookingRequest $request, Trip $trip)
    {
        if (!($user = $trip->users()->find(auth('api')->id()))) {
            $checked = $this->checkBooking($trip, Station::find($request->pickup_station_id), Station::find($request->arrival_station_id), 0);


            return $this->showAll(collect($checked)->except('can_book_a_seat'));
        } else {
            return $this->errorResponse("\"$user->name\" has already a booked seat.", 200);
        }
    }

    /**
     * Add booking to the specified resource from storage.
     *
     * @param  TripRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function book(BookingRequest $request, Trip $trip)
    {

        if (!($user = $trip->users()->find(auth('api')->id()))) {

            $checked = $this->checkBooking($trip, Station::find($request->pickup_station_id), Station::find($request->arrival_station_id), $request->seat_number);

            if ($checked['can_book_a_seat']) {
                $trip->users()->attach(auth('api')->id(), $request->only(['pickup_station_id', 'arrival_station_id', 'seat_number']));

                $bookings = auth('api')->user()->load('trips', 'trips.pivot.pickup', 'trips.pivot.arrival')->trips;

                return $this->showAll($bookings);
            }

            return $this->errorResponse($checked, 'Can\'t book this seat.');
        } else {
            return $this->errorResponse("\"$user->name\" has already a booked seat.", 200);
        }
    }
}
