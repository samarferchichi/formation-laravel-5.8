@extends('layouts.app')

@section('title')
  Edit Customers
@endsection

@section('content')
<h1>Edit Customers {{ $customer->name }}</h1>

<form action="/customers/{{ $customer->id }}" method="POST" class="pb-5">
<br>
  @method('PATCH')
  @include('customers.form')
</form>
<hr>

@endsection