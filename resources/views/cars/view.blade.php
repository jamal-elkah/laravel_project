


@extends('includes.layout-main')

@section('styles')

@endsection

@section('header')
    @include('includes.header')
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary" style="margin-top:30px">
            <h4 class="panel-heading" style="margin-top:-1px">{{$car->marque}}</h4>
            <div class="row">
                <div class="col-md-12">
                    <div align="center">
                        <img src="{{URL::to('images/'.$car->image)}}" alt="..." height="300" width="300">
                        <div class="caption">
                            <?php session(['car_id' => $car->id]);?>
                            <p><span class="label label-primary">Model: {{$car->model}}</span>
                            <span class="label label-danger">Type: {{$car->type}}</span>
                            <span class="label label-default">Prix/Jour: {{$car->prixJ}} dh</span></p>
                            @if($car->dispo)
                                @if(Auth::user())
                                <p><a href="{{route('commands.create')}}" class="btn btn-primary" role="button">Réserver</a></p>
                                @else
                                <p><a href="{{url('/login')}}" class="btn btn-primary" role="button">Réserver</a></p>
                                @endif
                            @else
                            <p>
                                <h2 class="text text-warning">Non Disponible</h2>
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('includes.footer')
@endsection

@section('scripts')

@endsection



