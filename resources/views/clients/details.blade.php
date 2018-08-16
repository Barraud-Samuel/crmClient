@extends('layouts.app')

@section('content')
    <h1 class="text-center">Details du Client</h1>
    <a href="/clients" class="btn-primary btn">Retour</a>
    <div class="card client-detail">
        <div class="card-header text-center">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-uppercase">{{$client->clientName}}</h3>
                    <small>{{$client->clientMail}}</small>
                </div>
            </div>
        </div>
        <div class="card-body">
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
        <p class="text-center">En cliquant sur une operation, vous avez acces aux inscris</p>
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
                        <th><button class="btn btn-link" data-toggle="collapse" data-target="#a{{$clientOperation->id}}" aria-expanded="true" aria-controls="collapseOne">{{$client->clientName}}</button></th>
                        <th>{{$clientOperation->url}}</th>
                        <th>{{$clientOperation->lang}}</th>
                        <th>{{$clientOperation->numberParticipants}}</th>
                        <th><span class="{{($clientOperation->status == 'En cours')?'badge-success badge' : (($clientOperation->status == 'Terminé')?'badge-secondary badge':'badge badge-warning')}}">{{$clientOperation->status}}</span></th>
                        <th>{{$clientOperation->loginAdmin}}</th>
                        <th>{{$clientOperation->passwordAdmin}}</th>
                        <th><a class="btn btn-success" href="/operations/{{$clientOperation->id}}/edit"><i class="far fa-edit"></i></a></th>
                        <th>
                            {!! Form::open(['action'=>['OperationsController@destroy', $clientOperation->id],'method'=>'POST']) !!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::button('<i class="far fa-trash-alt"></i>',['type'=>'submit','class'=>'btn btn-danger'])}}
                            {!! Form::close() !!}
                        </th>
                    </tr>
                    <tr>
                        <th colspan="9">
                            <div id="a{{$clientOperation->id}}" class="collapse">
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
                            </div>
                        </th>
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