


@extends('includes.layout-main')

@section('styles')

@endsection

@section('header')
    @include('includes.header')
@endsection

@section('content')
<div class="col-md-11 col-offset-md-1">
    <div class="panel panel-primary" style="margin-top:30px">
        <h4 class="panel-heading" style="margin-top:-1px">Toutes les voitures</h4>
        @if(count($cars) > 0)
            @foreach($cars as $car)
            <div class="media" style="padding:20px;">
                <div class="media-left">
                    <a href="{{route('cars.show',$car->id)}}">
                    <img class="media-object" src="{{URL::to('images/'.$car->image)}}" alt="..." height="150" width="150">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading text-info">{{$car->marque}}</h4>
                    <span class="label label-primary">Model:{{$car->model}}</span>
                    <span class="label label-danger">Type:{{$car->type}}</span>
                </div>
            </div>
            <hr>
            @endforeach
        @else
        <div class="alert alert-info">Aucune Voiture</div>
        @endif
    </div>
</div>
@endsection

@section('footer')
    @include('includes.footer')
@endsection

@section('scripts')

@endsection



