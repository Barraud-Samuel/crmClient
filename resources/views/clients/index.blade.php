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
                <th scope="col">Nombre d'opérations</th>
            </tr>
            </thead>
            <tbody class="table-striped">
            @foreach($clients as $indexkey => $client)
            <tr>
                <th scope="row">{{$indexkey + 1}}</th>
                <td><a href="/clients/{{$client->id}}">{{$client->clientName}}</a></td>
                <td>{{$client->clientMail}}</td>
                <td>nb operations</td>
            </tr>
            @endforeach
            </tbody>
            {{$clients->links()}}
        </table>

    @else
        <p class="text-center mt-5">Il n'y pas encore de client 😢</p>
    @endif
@endsection
