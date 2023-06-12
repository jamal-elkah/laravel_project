
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
            <h4 class="panel-heading" style="margin-top:-1px">Modifier une voiture</h4>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                        @if(count($errors) > 0)
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                        @endif
                        <form action="{{route('cars.update',$car)}}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                        {{-- {!!Form::model($car,['method'=>'PATCH','action'=>['CarsController@update',$car->id],'files'=>true])!!} --}}

                            <div class="form-group">
                                <label for="marque" >Marque*</label>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="marque" value="{{ old('marque',$car->marque)}} "/>
                            </div>
                            <div class="form-group">
                                <label for="model" >Model*</label>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="model" value="{{old('model',$car->model)}}"/>
                            </div>
                            <div class="form-group">
                              <label for="type" >Type*</label>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="type" value="{{old('type' ,$car->type)}}"/>
                            </div>
                            <div class="form-group">
                                <label for="prix" >Prix*</label>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="prixJ" value="{{old('prixJ' ,$car->prixJ)}}"/>
                            </div>
                            <div class="form-group">
                                <label for="dispo" >Disponible*</label>
                            </div>
                            <div class="form-group">
                                <select name="dispo" id="" class="form-control">

                                    <option {{old('dispo',$car->dispo)=="1"? 'selected':''}} value="1">Oui</option>
                                    <option {{old('dispo',$car->dispo)=="0"? 'selected':''}} value="0">Non</option>
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



