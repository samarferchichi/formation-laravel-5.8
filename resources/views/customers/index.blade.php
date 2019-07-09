@extends('layouts.app')

@section('title')
    Customers liste
@endsection

@section('content')

<h1>Customers List</h1>

@can('create', App\Customer::class)
    <a href="customers/create"> Add New Customer</a>
@endcan

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
<br>
<div class="row">
    <div class="col-12 d-flex justify-content-center">
        {{ $customres->links() }}
    </div>
</div>

@endsection