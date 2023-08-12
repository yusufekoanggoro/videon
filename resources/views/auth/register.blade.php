@extends('layouts.main')
@section('title', 'Register')

@section('header')
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Register</h3>
        </div>
        <div class="panel-body">
            <form method='POST' action='/auth/register'>
                {!! csrf_field() !!}

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{old('email')}}">
                </div>

                <div class="form-group">
                    <label>Number</label>
                    <input type="text" class="form-control" name="phone-number" value="{{old('phone-number')}}">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation">
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">Register</button>
                </div>

            </form>
        </div>
    </div>
@stop

@section('footer')
@stop