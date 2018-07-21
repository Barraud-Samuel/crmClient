@extends('layouts.app')

@section('content')
    <h1 class="text-center">Details du Client</h1>
    <a href="/clients" class="btn-primary btn">Retour</a>
    <div class="card client-detail">
        <div class="card-header text-center">
            <div class="row">
                <div class="col-4 justify-content-center align-self-center">
                    <span class="{{($client->status == 'En cours')?'badge-success badge' : (($client->status == 'Terminé')?'badge-secondary badge':'badge badge-warning')}}" {{$client->status}}>{{$client->status}}</span>
                </div>
                <div class="col-4">
                    <h3 class="text-uppercase">{{$client->clientName}}</h3>
                    <small>{{$client->clientMail}}</small>
                </div>
                <div class="col-4 justify-content-center align-self-center">
                    <span class="badge badge-danger">priorité : {{$client->priority}}</span>
                </div>
            </div>
        </div>
        <div class="card-body row">
            <div class="col-6 card card-body">
                <p>Langue du site : {{$client->country}}</p>
                <p class="card-text">Commentaire : {!! $client->clientComments !!}</p>
            </div>
            <div class="col-6 card card-body">
                <p>Acceder au site <a class="btn btn-primary" target="_blank" href="https://www.google.fr/">{{$client->urlSite}}</a></p>
                <p>Nbs de participants : {{$client->numberParticipants}}</p>
                <p>Login d'admin : {{$client->loginAdmin}}</p>
                <p>Mot de passe d'admin : {{$client->passwordAdmin}}</p>
            </div>
            <small>Client créé le : {{$client->created_at}}</small>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-6 text-left">
            <a href="/clients/{{$client->id}}/edit" class="btn-primary btn">Editer</a>
        </div>
        <div class="col-6 text-right">
            {!! Form::open(['action'=> ['ClientsController@destroy', $client->id],'method'=>'POST']) !!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
            {!! Form::close() !!}
        </div>
    </div>





    {{--START CLIENT USER--}}
    <div class="clientUsers">
        <h2 class="text-center">Utilisateurs du client</h2>
        @if(count($clientUsers)>0)
            <table class="clientUsers-list table-striped table table-dark">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Classement</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Mail</th>
                    <th scope="col">team</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clientUsers as $clientUser)
                    <tr>
                        <th>{{$clientUser->clientUser_rank}}</th>
                        <th>{{$clientUser->clientUser_Name}}</th>
                        <th>{{$clientUser->clientUser_email}}</th>
                        <th>{{$clientUser->clientUser_team}}</th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">il n'y a pas encore d'utilisateur pour ce client 😢</p>
        @endif
        {{--END CLIENT USER--}}
    </div>
@endsection