@extends('layouts.main')
@section('content')
<form method="POST" action="{{ route('bookings.store') }}">
    @csrf
    <div class="mb-3">
      <label for="NameSurname" class="form-label">Nome e Cognome</label>
      <input type="text" class="form-control" id="NameSurname" name="booking_name" aria-describedby="emailHelp" value="{{old('booking_name')}}">
      @error('booking_name')
          {{ $message }}
      @enderror
    </div>
    <div class="mb-3">
        <label for="CreditCard" class="form-label">Numero Carta di Credito</label>
        <input type="number" class="form-control" id="CreditCard" name="booking_credit_card" aria-describedby="emailHelp" value="{{old('booking_credit_card')}}">
        @error('booking_credit_card')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label for="RoomNumber" class="form-label">Stanza Numero</label>
        <input type="number" class="form-control" id="RoomNumber" name="booking_room" aria-describedby="emailHelp" value="{{old('booking_room')}}">
        @error('booking_room')
          {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label for="FromDate" class="form-label">Dal giorno</label>
        <input type="date" class="form-control" id="FromDate" name="booking_from" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="ToDate" class="form-label">Al giorno</label>
        <input type="date" class="form-control" id="ToDate" name="booking_to" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="more_details" class="form-label">Descrizione</label>
        <textarea name="booking_more_details" id="more_details" cols="30" rows="10" value="">
            {{old('booking_name')}}
        </textarea>
        @error('booking_more_details')
          {{ $message }}
        @enderror
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection