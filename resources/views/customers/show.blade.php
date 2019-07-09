@extends('layouts.app')

@section('title')
  Add new Customers
@endsection

@section('content')
<h1>Detail for {{ $customer->name }}</h1>
<p><a href="/customers/{{ $customer->id }}/edit">Edit</a></p>

<form action="/customers/{{ $customer->id }}" method="POST">
  @method('DELETE')
  @csrf

  <button type="submit" class="btn btn-danger"> Delete </button>
</form>
<br>
<div class="row">
    <div class="col-12">
        <p><strong> Name </strong> {{ $customer->name }}</p>
        <p><strong> Email </strong> {{ $customer->email }}</p>
        <p><strong> Company </strong> {{ $customer->company->name }}</p>

    </div>
</div>
@if($customer->image)
    <div class="row">
        <div class="col-12">
          <img src="{{asset('storage/' . $customer->image)}}" alt="" class="img-thumbnail">
        </div>
    </div>
@endif
<hr>

@endsection