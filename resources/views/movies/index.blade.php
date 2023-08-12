@extends('layouts.main')
@section('title', 'Home')

@section('content')
    <section class="content-block gallery-1 gallery-1-1">
        <div class="container">
            <div class="underlined-title">
                <h1>Bored?</h1>
                <hr>
                <h2>THERE IS A FILM FOR EVERYONE</h2>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <label class="control-label" for="formInput18">Finding a film is only the beginning</label>
                        {!! Form::open(array('action' => 'MoviesController@search', 'method' => 'GET')) !!}
                                {!! Form::text('searchString', null, array('class' => 'form-control', 'id' => 'searchForm', 'placeholder' => 'Search movies')) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <ul class="filter-php">
                <li>
                    <a href="/">All</a>
                </li>
                @foreach($categories as $category)
                <li>
                    <a href="/categories/{{ $category->id }}">{{ $category->name }}</a>
                </li>
                @endforeach
            </ul>
            <!-- /.gallery-filter -->
            <div class="row">
                <div class="isotope-gallery-container">
                    @foreach($movies as $movie)
                    <div class="col-md-3 col-sm-6 col-xs-12 gallery-item-wrapper artwork creative">
                        <div class="gallery-item">
                            <div class="gallery-thumb">
                                <img src="{{ URL::asset('images/uploaded/' . $movie->main_image) }}" class="img-responsive" alt="{{ $movie->name }}">
                                <div class="image-overlay"></div>
                                <a href="{{ URL::asset('images/uploaded/' . $movie->main_image) }}" class="gallery-zoom"><i class="fa fa-eye" alt="{{ $movie->name }}"></i></a>
                                <a href="movies/{{ $movie->id }}/" class="gallery-link"><i class="fa fa-film"></i></a>
                            </div>
                            <div class="gallery-details">
                                <h5>{{ $movie->name }}</h5>
                                <h5>Rp. {{ $movie->price }}</h5>

                                @if(!Auth::guest() && Auth::user()->privileges == 1)
                                    <a href="/movies/{{ $movie->id }}/edit">Edit</a>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['movies.destroy', $movie->id]]) !!}
                                        {!! Form::submit('Delete') !!}
                                    {!! Form::close() !!}
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- /.gallery-item-wrapper -->
                </div>
                <!-- /.isotope-gallery-container -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
@stop

@section('footer')
@stop