@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('My Booking') }}</div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover table-inverse table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Trip</th>
                                    <th>Time</th>
                                    <th>Pickup</th>
                                    <th>Arrival</th>
                                    <th>Seat Number</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($trips as $trip)
                                    <tr>
                                        <td scope="row"></td>
                                        <td>{{ $trip->name }}</td>
                                        <td>{{ $trip->time }}</td>
                                        <td>{{ $trip->pivot->pickup->name }}</td>
                                        <td>{{ $trip->pivot->arrival->name }}</td>
                                        <td>{{ orderSuffix($trip->pivot->seat_number) }} Seat</td>
                                        <td>
                                            <a href="{{ route('books.edit', $book->id) }}">
                                                <button type="button" class="btn btn-success  waves-effect waves-light"
                                                    aria-expanded="false">@lang('admin.edit')</button>
                                            </a>
                                            <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                                style="display: inline-block;">
                                                <input name="_method" type="hidden" value="DELETE">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger  waves-effect waves-light"
                                                    aria-expanded="false">@lang('admin.remove')</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="4" class="text-center">
                                        No bookings yet.
                                    </td>

                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
