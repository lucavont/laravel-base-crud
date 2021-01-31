@extends('layouts.main')
@section('content')
<div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">{{ $booking->guest_full_name }}</h5>
      <p class="card-text">{{$booking->more_details}}</p>
    </div>
    <div class="card-footer">
      <span>Numero Carta di Credito: {{$booking->guest_credit_card}}</span>
    </div>
  </div>
@endsection