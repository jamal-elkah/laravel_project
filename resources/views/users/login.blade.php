
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
        @if(Session::has('fail'))
            <div class="alert alert-danger">
                {{Session::get('fail')}}
            </div>
        @endif
        <div class="panel panel-primary" style="margin-top:30px">
            <h4 class="panel-heading" style="margin-top:-1px">Connexion</h4>
            <form action="{{route('users.login')}}" method="post" style="padding:20px;">
                <div class="form-group">
                    <label for="email">Email:*</label>
                    <input type="email" class="form-control" name="email"  placeholder="Entrer votre email">
                    <input type="hidden" class="form-control" name="_token" value="{{Session::token()}}">
                </div>
                <div class="form-group">
                    <label for="passe">Mot de passe:*</label>
                    <input type="password" class="form-control" name="password"  placeholder="Entrer votre mot de passe">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="Valider">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('includes.footer')
@endsection

@section('scripts')

@endsection



