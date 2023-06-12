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
            @if (Session::has('fail'))
                <div class="alert alert-danger">
                    {{Session::get('fail')}}
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
            <h3 class="text-info">Commandes</h3>
            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Utl Id</th>
                    <th>Voit Id</th>
                    <th>Date location</th>
                    <th>Date Restitution</th>
                    <th>Prix TTC</th>
                    <th>Action</th>
                </tr>
                @foreach ($commands as $command)
                <tr>
                    <td>{{$command->id}}</td>
                    <td>{{$command->user_id}}</td>
                    <td>{{$command->car_id}}</td>
                    <td>{{$command->dateL}}</td>
                    <td>{{$command->dateR}}</td>
                    <td>{{$command->prixTTC}} dh</td>
                    <td><a href="{{route('commands.destroy',$command->id)}}" class="btn btn-danger">Supprimer</a></td>
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

