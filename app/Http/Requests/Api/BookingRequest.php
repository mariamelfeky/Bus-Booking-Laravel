<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
            if ($this->routeIs('booking.book')) {
                return [
                    'pickup_station_id' => ['required', 'exists:stations,id'],
                    'arrival_station_id' => ['required', 'exists:stations,id'],
                    'seat_number' => ['required', 'numeric', 'between:1,12']
                ];
            }

        if ($this->routeIs('booking.available')) {
            return [
                'pickup_station_id' => ['required', 'exists:stations,id'],
                'arrival_station_id' => ['required', 'exists:stations,id'],
            ];
        }
    }
}
