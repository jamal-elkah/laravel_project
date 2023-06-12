@extends('includes.layout-main')

@section('styles')

@endsection

@section('header')
    @include('includes.header')
@endsection

@section('content')
@if(Session::has('fail'))
    <div class="alert alert-danger">
        {{Session::get('fail')}}
    </div>
@endif
@if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
@endif
<div class="row">
    <div class="col-md-3">
        <div class="panel panel-primary" style="margin-top:30px">
            <h4 class="panel-heading" style="margin-top:-1px">Rechercher</h4>
            <form action="{{route('search')}}" method="post" style="padding:20px;">
                <div class="form-group">
                    <label for="marque">Marque:*</label>
                    <input type="text" 
                    @isset($marque)
                    value="{{ $marque }}"
                    @endisset
                    class="form-control" name="marque" placeholder="Entrer une marque">
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="Valider">
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-5 col-offset-md-1">
        <div class="panel panel-primary" style="margin-top:30px">
            <h4 class="panel-heading" style="margin-top:-1px">Toutes les voitures</h4>
            @if(count($cars) > 0)
                @foreach($cars as $car)
                <div class="media" style="padding:20px;">
                    <div class="media-left">
                        <a href="{{route('cars.show',$car->id)}}">
                        <img class="media-object" src="{{URL::to('images/'.$car->image)}}" alt="..." height="50" width="50">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading text-info">{{$car->marque}}</h4>
                        <span class="label label-success">Model : {{$car->model}}</span>
                        <span class="label label-warning">Type : {{$car->type}}</span>
                    </div>
                </div>
                @endforeach
            @else
            <div class="alert alert-info">Aucune Voiture</div>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-primary" style="margin-top:30px">
            <h4 class="panel-heading" style="margin-top:-1px">Voitures Disponibles</h4>
            <ul class="list-group">
            @if(count($dispo) > 0)
                @foreach($dispo as $car)
                    <li class="list-group-item">
                    <div class="media-left">
                        <a href="{{route('cars.show',$car->id)}}">
                        <img class="media-object" src="{{URL::to('images/'.$car->image)}}" alt="..." height="50" width="50">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading text-info">{{$car->marque}}</h4>
                        <span class="label label-success">Model : {{$car->model}}</span>
                        <span class="label label-warning">Type : {{$car->type}}</span>
                    </div>
                    </li>
                @endforeach
            @else
            <div class="alert alert-info">Aucune Voiture</div>
            @endif
            </ul>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('includes.footer')
@endsection

@section('scripts')

@endsection



