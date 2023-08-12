@extends('layouts.main')
@section('title', 'Login')

@section('header')
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Login</h3>
        </div>
        <div class="panel-body">
            <form method='POST' action='/auth/login'>
                {!! csrf_field() !!}

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{old('email')}}">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                </div>


                <div class="form-group">
                    <button class="btn btn-success" type="submit">Login</button>
                </div>

            </form>
        </div>
    </div>
@stop

@section('footer')
@stop