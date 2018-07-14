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
                    <h3>{{$client->clientName}}</h3>
                    <small>{{$client->clientMail}}</small>
                </div>
                <div class="col-4 justify-content-center align-self-center">
                    <span class="badge badge-danger">{{$client->priority}}</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <p>{{$client->country}}</p>
            <h5>{{$client->status}}</h5>
            <p class="card-text">{!! $client->clientComments !!}</p>
            <a class="btn btn-primary" target="_blank" href="https://www.google.fr/">{{$client->urlSite}}</a>
            <p>Nbs de participants : {{$client->numberParticipants}}</p>
            <p>Login d'admin : {{$client->loginAdmin}}</p>
            <p>Mot de passe d'admin : {{$client->passwordAdmin}}</p>
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
@endsection