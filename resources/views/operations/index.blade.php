@extends('layouts.app')

@section('content')
    <h1 class="text-center">Operations</h1>
    <p class="text-center">En cliquant sur une operation, vous avez acces au detail</p>
    <div class="form-row text-center">
        <div class="col-12">
            <a class=" add-client btn btn-outline-primary btn-lg" href="/operations/create">Ajouter une operation</a>
        </div>
    </div>
    @if(count($operations)>0)
        <table class="client-list table table-striped table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#{{$operations->count()}}</th>
                <th scope="col">Nom du client</th>
                <th scope="col">url</th>
                <th scope="col">langue</th>
                <th scope="col">Nombre de participants</th>
                <th scope="col">Status</th>
                <th scope="col">Login de l'admin</th>
                <th scope="col">Mdp de l'admin</th>
                <th scope="col">Nombre d'opérations</th>
            </tr>
            </thead>
            <tbody class="table-striped">
            @foreach($operations as $indexkey => $operation)
                <tr>
                    <th scope="row">{{$indexkey + 1}}</th>
                    <th>
                        @foreach($clients as $key => $client)
                            @if($key+1 === $operation->client_id)
                            <a href="/clients/{{$operation->client_id}}">{{$client->clientName}}</a>
                            @endif
                        @endforeach
                    </th>
                    <td><a href="">{{$operation->url}}</a></td>
                    <td>{{$operation->lang}}</td>
                    <td>{{$operation->numberParticipants}}</td>
                    <td>{{$operation->status}}</td>
                    <td>{{$operation->loginAdmin}}</td>
                    <td>{{$operation->passwordAdmin}}</td>
                    <td>nb operations</td>
                </tr>
            @endforeach
            </tbody>
            {{$operations->links()}}
        </table>

    @else
        <p>Il n'y pas encore de client</p>
        <a class="btn btn-primary" href="/clients/create">Créez-en un</a>
    @endif
@endsection
