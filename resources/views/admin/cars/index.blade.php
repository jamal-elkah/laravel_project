


@extends('includes.layout-main')

@section('styles')

@endsection

@section('header')
    @include('includes.header')
@endsection

@section('content')
<div class="row">
    <div class="row">
        <div class="col-md-12">
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
            <h2 class="text-info">Voitures</h2>
            <div class="form-group">
                <a href="{{route('cars.create')}}" class="btn btn-primary pull-right" style="margin:20px">Ajouter</a>
            </div>
            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Marque</th>
                    <th>Model</th>
                    <th>Type</th>
                    <th>Prix Journalier</th>
                    <th>Disponible</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
                @foreach($cars as $car)
                <tr>
                    <td>{{$car->id}}</td>
                    <td>{{$car->marque}}</td>
                    <td>{{$car->model}}</td>
                    <td>{{$car->type}}</td>
                    <td>{{$car->prixJ}} dh</td>
                    <td>{{$car->dispo ? 'oui' : 'non'}}</td>
                    <td><img src="{{URL::to('images/'.$car->image)}}" height="50" width="50"/></td>
                    <td>
                        <a href="{{route('cars.edit',$car->id)}}" class="btn btn-success">Modifier</a>
                        <a href="{{route('cars.destroy',$car->id)}}" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection

@section('footer')

@endsection

@section('scripts')

@endsection



