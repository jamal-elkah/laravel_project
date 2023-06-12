@extends('includes.layout-main')

@section('styles')
@endsection
 
@section('header')
    @include('includes.header')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-info" style="margin-top:-1px">Profile</h3>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div>
                        <img class="media-object thumbnail" src="http://lorempixel.com/150/150/" alt="...">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="container">
                            <p><span class="text-danger">Nom & Prénom :</span> {{ $user->nom }}</p>
                            <p><span class="text-danger">Email :</span> {{ $user->email }}</p>
                            <p><span class="text-danger">Ville :</span> {{ $user->ville }}</p>
                            <p><span class="text-danger">Téléphone :</span> {{ $user->tel }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @unless (Auth::user()->isAdmin)
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-info">Mes réservations</h3>
                <table class="table">
                    <tr>
                        <th>Voiture</th>
                        <th>Date location</th>
                        <th>Date restitution</th>
                        <th>Prix TTC</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($user->commands as $command)
                        <tr>
                            <td>{{ App\Models\Car::find($command->car_id)->marque }}</td>
                            <td>{{ $command->dateL }}</td>
                            <td>{{ $command->dateR }}</td>
                            <td>{{ $command->prixTTC }} dh</td>
                            <td>
                                {{-- {!!Form::open(['method'=>'POST','action'=>['UsersController@deleteCommand',$command->id]])!!} --}}
                                <form action="{{ route('users.deleteCommand', $command->id) }}" method="POST">

                                    @csrf
                                    <div class="form-group">
                                        {{-- {!!Form::hidden('car_id',) !!} --}}
                                        <input type="hidden" name="car_id"
                                            value="{{ App\Models\Car::find($command->car_id)->id }}">
                                    </div>
                                    <div class="form-group">
                                        {{-- {!!Form::submit('Supprimer',['class'=>'btn btn-danger']) !!} --}}
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </div>
                                </form>
                                {{-- {!! Form::close() !!} --}}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    @endunless
    </div>
@endsection

@section('footer')
    @include('includes.footer')
@endsection

@section('scripts')
@endsection
