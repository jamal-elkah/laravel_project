
@extends('includes.layout-main')

@section('styles')

@endsection

@section('header')
    @include('includes.header')
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
        <div class="panel panel-primary" style="margin-top:30px">
            <h4 class="panel-heading" style="margin-top:-1px">Louer une voiture</h4>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                        {{-- {!! Form::open(['method'=>'POST','action'=>['CommandsController@store']])!!} --}}
                        <form action="{{route('commands.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="dateL">Date de location:*</label>
                                <input type="date" class="form-control" name="dateL">
                            </div>
                            <div class="form-group">
                                <label for="dateR">Date de restitution:*</label>
                                <input type="date" class="form-control" name="dateR">
                            </div>
                            <div class="form-group">
                                {{-- {!! Form::submit('Valider',['class'=>'btn btn-primary']) !!} --}}
                                <button type="submit" class='btn btn-primary'>Valider</button>
                            </div>
                    </form>
                    {{-- {!! Form::close() !!} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')

@endsection

@section('scripts')

@endsection



