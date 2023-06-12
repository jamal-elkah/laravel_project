


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
            <h4 class="panel-heading" style="margin-top:-1px">Ajouter une voiture</h4>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                        @if(count($errors) > 0)
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                        @endif

                    <form action="{{route('cars.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="marque" >Marque*</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="marque" value="{{ old('marque')}}"/>
                        </div>
                        <div class="form-group">
                            <label for="model" >Model*</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="model" value="{{ old('model')}}"/>
                        </div>
                        <div class="form-group">
                          <label for="type" >Type*</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="type" value="{{ old('type')}}"/>
                        </div>
                        <div class="form-group">
                            <label for="prix" >Prix*</label>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="prix" value="{{ old('prix')}}"/>
                        </div>
                        <div class="form-group">
                            <label for="dispo" >Disponible*</label>
                        </div>
                        <div class="form-group">
                            <select name="dispo" id="" class="form-control">
                                <option value="1">Oui</option>
                                <option value="0">Non</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="photo" >Photo*</label>
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control" name="photo" value="{{ old('photo')}}">
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </form>
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



