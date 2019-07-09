@extends('layouts.app')

@section('title')
  Edit Customers
@endsection

@section('content')
<h1>Edit Customers {{ $customer->name }}</h1>

<form action="/customers/{{ $customer->id }}" method="POST" class="pb-5" enctype="multipart/form-data">
<br>
  @method('PATCH')
  @include('customers.form')
  <button type="submit" class="btn btn-info"> Save customer</button>

</form>
<hr>

@endsection