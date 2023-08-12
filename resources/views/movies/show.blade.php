@extends('layouts.main')
@section('title', $movie->name)

@section('content')
    <section class="content-block content-1-8">
        <div class="container">
            <ul class="nav nav-tabs text-center" role="tablist" id="myTab">
                <li class="active">
                    <a href="#tab1" role="tab" data-toggle="tab">Overview</a>
                </li>
                <li>
                    <a href="#tab2" role="tab" data-toggle="tab">Synopsis</a>
                </li>
                <li>
                    <a href="#tab3" role="tab" data-toggle="tab">Rent</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-1 col-sm-6">
                            <img class="img-responsive" src="{{ URL::asset('images/uploaded/' . $movie->main_image) }}">
                        </div>
                        <!-- /.col -->
                        <div class="col-md-5 col-sm-6">
                            <h3>{{ $movie->name }}</h3>
                            <p>{{ $movie->director }}</p>
                            <p>{{ $movie->genre }}</p>
                            <p>Rp. {{ $movie->price }}</p>

                            @if(!Auth::guest() && Auth::user()->privileges == 1)
                                <a class="btn btn-primary" href="/movies/{{ $movie->id }}/edit">Edit</a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['movies.destroy', $movie->id]]) !!}
                                    {!! Form::submit('Delete', $attributes = ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            @endif
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /#tab1 -->
                <div class="tab-pane fade" id="tab2">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 text-center">
                            <h3>Synopsis</h3>
                            <p>{{ $movie->synopsis }}</p>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div id="carousel1" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel1" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel1" data-slide-to="1"></li>
                                    <li data-target="#carousel1" data-slide-to="2"></li>
                                </ol>
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img class="img-responsive" src="{{ URL::asset('images/uploaded/' . $movie->_image1) }}" alt="image1" />
                                        <div class="carousel-caption">
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="{{ URL::asset('images/uploaded/' . $movie->_image2) }}" alt="image2" />
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="{{ URL::asset('images/uploaded/' . $movie->_image3) }}" alt="image3" />
                                    </div>
                                </div>
                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel1" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel1" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /#tab2 -->

                <div class="tab-pane fade" id="tab3">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 text-center">
                            <h3>Rent This movie</h3>
                            @if( $movie->quantity > 0)
                                <p>Interested in renting {{ $movie->name }}?</p>
                                <p> We have {{ $movie->quantity }} left!</p>
                                <a href="/addItem/{{$movie->id}}"> <button type="button" class="btn btn-success">
                                        Add to basket
                                    </button>
                                </a>
                            @else
                                <p>We're out. Check later</p>
                            @endif


                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /#tab2 -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.container -->
    </section>
@stop

@section('footer')
@stop