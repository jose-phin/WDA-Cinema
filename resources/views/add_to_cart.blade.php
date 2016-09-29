@extends('layouts.app')
@section('pageTitle', 'Movies')
@section('content')
    <div class="container">
        <div class="content">

            <h2>Add to Cart</h2>

            <div class="flex-container">
                <form method="POST" action="{{ url('user/cart/add') }}">
                    {{ csrf_field() }}

                    <input id="session_id" type="number" name="session_id">
                    <input id="adult_qty" type="number" name="adult_qty" value="0">
                    <input id="adult_qty" type="number" name="child_qty" value="0">
                    <input id="adult_qty" type="number" name="concession_qty" value="0">

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection