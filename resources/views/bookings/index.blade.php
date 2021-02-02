@extends('layouts.main')

@section('content')
    
<table class="table">
    <thead>
      <tr>
        @foreach ($columns as $columnId => $columnValue)
        <th scope="col">{{$columnValue}}</th>
        @endforeach
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($bookings as $booking)
        <tr>
          <th scope="row">{{ $booking->id }}</th>
          <td>{{$booking->guest_full_name}}</td>
          <td>{{$booking->room}}</td>
          <td>{{$booking->from_date}}</td>
          <td>{{$booking->to_date}}</td>
          <td><a href="{{route('bookings.show', $booking->id)}}">Vedi</a></td>
          <td><a href="{{route('bookings.edit', $booking->id)}}">Aggiorna</a></td>
        </tr>
        @endforeach
    </tbody>
  </table>

@endsection