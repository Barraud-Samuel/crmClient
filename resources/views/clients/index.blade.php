@extends('layouts.app')

@section('content')
    <h1 class="text-center">Clients</h1>
    <p class="text-center">En cliquant sur un client, vous avez acces au detail</p>
    <div class="form-row text-center">
        <div class="col-12">
            <a class=" add-client btn btn-outline-primary btn-lg" href="/clients/create">Ajouter un client</a>
        </div>
    </div>
    @if(count($clients)>0)
        <table class="client-list table table-striped table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col"># {{$clients->count()}}</th>
                <th scope="col">Client</th>
                <th scope="col">Mail</th>
                <th scope="col">Priorité</th>
                <th scope="col">Status</th>
                <th scope="col">Url</th>
                <th scope="col">Nombre de participants</th>
            </tr>
            </thead>
            <tbody class="table-striped">
            @foreach($clients as $indexkey => $client)
            <tr>
                <th scope="row">{{$indexkey + 1}}</th>
                <td><a href="/clients/{{$client->id}}">{{$client->clientName}}</a></td>
                <td>{{$client->clientMail}}</td>
                <td>{{$client->priority}}</td>
                <td><span class="{{($client->status == 'En cours')?'badge-success badge' : (($client->status == 'Terminé')?'badge-secondary badge':'badge badge-warning')}}" {{$client->status}}>{{$client->status}}</span></td>
                <td><a target="_blank" href="https://www.google.fr/">{{$client->urlSite}}</a></td>
                <td>{{$client->numberParticipants}}</td>
            </tr>
                {{--START CLIENT USER--}}
                @if(count($clientUsers)>0)
                    <tr>
                        <td colspan="7">
                             <table class="clientUsers-list table table-dark">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Classement</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Mail</th>
                                    <th scope="col">team</th>
                                </tr>
                                </thead>
                                <tbody class="thead-dark">
                                @foreach($clientUsers as $clientUser)
                                    @if($indexkey+1 === $clientUser->clientId)
                                        <tr>
                                            <th>{{$clientUser->clientUser_rank}}</th>
                                            <th>{{$clientUser->clientUser_Name}}</th>
                                            <th>{{$clientUser->clientUser_email}}</th>
                                            <th>{{$clientUser->clientUser_team}}</th>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endif
                {{--END CLIENT USER--}}
            @endforeach
            </tbody>
            {{$clients->links()}}
        </table>

    @else
        <p>Il n'y pas encore de client</p>
        <a class="btn btn-primary" href="/clients/create">Créez-en un</a>
    @endif
@endsection

