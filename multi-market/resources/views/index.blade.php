@include('head')
<div class="container">

    @include('menu')

    <!-- Jumbotron -->
    <div class="jumbotron">
        <h1>Scan or enter the barcode</h1>
        <div class="form-group">
            {{ Form::open(['url' => '/show', 'method' => 'post']) }}
            {{ Form::text('search_box', null, ['class' => 'form-control', 'tabindex' => 1, 'autofocus' => ' autofocus']) }}
            <br>
            {!! Form::submit('Search', ['class' => 'btn btn-primary', 'tabindex' => 2]) !!}

            {{ Form::close() }}
        </div>
    </div>

    @include('footer')