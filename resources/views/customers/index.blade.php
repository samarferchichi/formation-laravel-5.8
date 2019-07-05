@extends('layouts.app')

@section('title')
    Customers liste
@endsection

@section('content')
<h1>Customers List</h1>
<a href="customers/create"> Add New Customer</a>

<hr>
    @foreach($customres as $customer)
        <div class="row">
            <div class="col-2">
                {{ $customer->id }}
            </div>
            <div class="col-4">
               <a href="/customers/{{ $customer->id }}"> {{ $customer->name }}</a>
            </div>
            <div class="col-4">{{ $customer->company->name }}</div>
            <div class="col-2">{{ $customer->active }}</div>

        </div>
    @endforeach
@endsection