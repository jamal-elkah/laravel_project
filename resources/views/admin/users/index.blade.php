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
            <h3 class="text-info">Inscrits</h3>
            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Nom & Prénom</th>
                    <th>Email</th>
                    <th>Ville</th>
                    <th>Téléphone</th>
                    <th>Action</th>
                </tr>
                @foreach( $users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->nom}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->ville}}</td>
                    <td>{{$user->tel}}</td>
                    <td>
                        <a href="{{route('users.destroy',$user->id)}}" class="btn btn-danger">Supprimer</a>
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
