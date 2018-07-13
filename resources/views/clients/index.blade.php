@extends('layouts.app')

@section('content')
    <h1>Clients</h1>
    <a class="btn btn-info" href="/clients/create">Ajouter un client</a>
    @if(count($clients)>0)
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Client</th>
                <th scope="col">Mail</th>
                <th scope="col">Priorité</th>
                <th scope="col">Status</th>
                <th scope="col">Url</th>
                <th scope="col">Nombre de participants</th>
            </tr>
            </thead>
            <tbody class="table-striped">
            @foreach($clients as $client)
            <tr>
                <th scope="row">{{$client->id}}</th>
                <td><a href="/clients/{{$client->id}}">{{$client->clientName}}</a></td>
                <td>{{$client->clientMail}}</td>
                <td>{{$client->priority}}</td>
                <td>{{$client->status}}</td>
                <td><a target="_blank" href="https://www.google.fr/">{{$client->urlSite}}</a></td>
                <td>{{$client->numberParticipants}}</td>
            </tr>
            @endforeach
            </tbody>
            {{$clients->links()}}
        </table>

    @else
        <p>Il n'y pas encore de client</p>
        <a class="btn btn-primary" href="/create">Créez-en un</a>
    @endif
@endsection

