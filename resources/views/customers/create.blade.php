@extends('layouts.app')

@section('title')
  Add new Customers
@endsection

@section('content')
<h1>Add new Customers</h1>

<form action="/customers" method="POST" class="pb-5" enctype="multipart/form-data">
<br>


  @include('customers.form')
  <button type="submit" class="btn btn-info"> Save customer</button>

</form>
<hr>

@endsection