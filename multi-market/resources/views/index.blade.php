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

    {{--<div class="jumbotron">--}}
        {{--<h1>Scan or enter the barcode</h1>--}}
        {{--{{ Form::open(['url' => '/show', 'method' => 'post']) }}--}}

        {{--<div id="field-container" class="form-group {{ $errors->has('search_box') ? 'has-error' : '' }}">--}}
            {{--{!! Form::label('search_box', 'Search', ['class' => 'req col-sm-offset-1 col-sm-3 control-label']) !!}--}}
            {{--{{ Form::text('search_box', null, ['class' => 'form-control', 'tabindex' => 1, 'autofocus' => ' autofocus']) }}--}}
            {{--{!! $errors->has('audiences') ? '<p class="col-sm-8 col-sm-offset-4 text-danger"><strong>' . $errors->first('search_box') . '</strong></p>' : '' !!}--}}
            {{--{!! Form::submit('Search', ['class' => 'btn btn-primary', 'tabindex' => 2]) !!}--}}
        {{--</div>--}}
        {{--{{ Form::close() }}--}}

    {{--</div>--}}

    @include('footer')