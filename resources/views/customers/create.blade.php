@extends('layouts.app')

@section('title')
  Add new Customers
@endsection

@section('content')
<h1>Add new Customers</h1>

<form action="/customers" method="POST" class="pb-5">
<br>


  @include('customers.form')
</form>
<hr>

@endsection