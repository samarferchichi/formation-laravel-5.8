@extends('layouts.app')

@section('content')
<h1>Contact us</h1>

@if( ! session()->has('message'))
<form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">

<label for="name"> Name  </label>
    <div class="input-group">
        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
        {{ $errors->first('name')}}
    </div>
<br>
    <label for="email"> Email  </label>

    <div class="input-group">
        <input type="text" name="email"  value="{{ old('email') }}" class="form-control">
        {{ $errors->first('email')}}

    </div>
    <br>

    <label for="message"> Message  </label>

    <div class="input-group">
        <textarea name="message" id="message" cols="30" rows="10" class="form-control">{{ old('message') }}</textarea>
        <div> {{ $errors->first('message')}} </div>

    </div>
    <br>
    @csrf
    <button type="sumbit" class="btn btn-primary">Send message</button>
</form>
@endif
@endsection
