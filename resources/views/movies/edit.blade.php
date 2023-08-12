@extends('layouts.main')
@section('title', 'Edit Movie')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel">
            <div class="panel-body">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit current</h3>
                </div>

                {!! Form::open(['action' => ['MoviesController@update', $movie->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                        <!-- The last key value pair will allow an admin to upload images from the server or where ever-->
                <div class="form-group">
                    {!! Form::label('name', 'Movie Title:') !!}
                    {!! Form::text('name', $value = $movie->name, $attributes = ['class' => 'form-control', 'name' => 'name']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('director', 'Director:') !!}
                    {!! Form::text('director', $value = $movie->director, $attributes = ['class' => 'form-control', 'name' => 'director']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('genre', 'Type in a genre:') !!}
                    {!! Form::text('genre', $value = $movie->genre, $attributes = ['class' => 'form-control', 'name' => 'genre']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('synopsis', 'A synopsis') !!}
                    {!! Form::textarea('synopsis', $value = $movie->synopsis, $attributes = ['class' => 'form-control', 'name' => 'synopsis']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('price', 'Type in a price:') !!}
                    {!! Form::text('price', $value = $movie->price, $attributes = ['class' => 'form-control', 'name' => 'price', 'placeholder' => 'Rp. 3.50, Rp. 2.50, or Rp. 1.00']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('quantity', 'Enter a quantity:') !!}
                    {!! Form::text('quantity', $value = $movie->quantity, $attributes = ['class' => 'form-control', 'name' => 'quantity', 'placeholder' => '1, 10?']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('main_image', 'Main Image:') !!}
                    {!! Form::file('main_image', $attributes = ['class' => 'btn btn-default']) !!}
                </div>

                <panel class="panel-heading"><hr></panel>

                <div class="form-group">
                    {!! Form::label('_image1', 'Image 1:') !!}
                    {!! Form::file('_image1', $attributes = ['class' => 'btn btn-default']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('_image2', 'Image 2:') !!}
                    {!! Form::file('_image2', $attributes = ['class' => 'btn btn-default']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('_image3', 'Image 3:') !!}
                    {!! Form::file('_image3', $attributes = ['class' => 'btn btn-default']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('category_id', 'Type of movie:') !!}
                    <select name="category_id" class="form_control">
                        <option value="1">Latest</option>
                        <option value="2">Modern</option>
                        <option value="3">Old</option>
                        <option value="4">Kids</option>
                    </select>
                </div>

                <div class="form-group">
                    {!! Form::submit('Submit', $attributes = ['class' =>'btn btn-primary']) !!}
                </div>



                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('footer')
@stop