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
        <div class="card-body">
            <h5 class="card-text mt-3">Langue du site : {{$client->country}}</h5>
            <h5 class="card-text mt-3">Acceder au site : <a target="_blank" href="https://www.google.fr/"><u>{{$client->urlSite}}</u></a></h5>
            <h5 class="card-text mt-3">Nbs de participants : {{$client->numberParticipants}}</h5>
            <h5 class="card-text mt-3">Login d'admin : {{$client->loginAdmin}}</h5>
            <h5 class="card-text mt-3">Mot de passe d'admin : {{$client->passwordAdmin}}</h5>
            <h5 class="card-text mt-3">Commentaire : {!! $client->clientComments !!}</h5>
            <hr>
            <small>Client créé le : {{$client->created_at}}</small>
        </div>
    </div>
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


    {{--START OPERATION LIST--}}
    <div class="clientOperation mt-5">
        <h2 class="text-center">Opérations du client</h2>
        @if(count($clientOperations)>0)
            <table class="table-striped table mt-3">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Nom du client</th>
                    <th scope="col">Lien de l'opération</th>
                    <th scope="col">Langue</th>
                    <th scope="col">nombre de participants</th>
                    <th scope="col">Status</th>
                    <th scope="col">Login Admin</th>
                    <th scope="col">Mot de passe Admin</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($clientOperations as $clientOperation)
                    <tr>
                        <th>{{$client->clientName}}</th>
                        <th>{{$clientOperation->url}}</th>
                        <th>{{$clientOperation->lang}}</th>
                        <th>{{$clientOperation->numberParticipants}}</th>
                        <th><span class="{{($clientOperation->status == 'En cours')?'badge-success badge' : (($clientOperation->status == 'Terminé')?'badge-secondary badge':'badge badge-warning')}}">{{$clientOperation->status}}</span></th>
                        <th>{{$clientOperation->loginAdmin}}</th>
                        <th>{{$clientOperation->passwordAdmin}}</th>
                        <th><a href="/operations/{{$clientOperation->id}}/edit"><i class="far fa-edit"></i></a></th>
                        <th><a href=""><i class="far fa-trash-alt"></i></a></th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">il n'y a pas encore d'opérations pour ce client 😢</p>
        @endif
        <p class="text-center mt-5"><a href="/operations/{{$client->id}}/create" class="btn-dark btn text-center">Creer une operation pour ce client</a></p>
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