@extends('layouts.app')

@section('content')
    <h1>Details du Client</h1>
    <a href="/clients" class="btn-primary btn">Retour</a>
    <div class="card">
        <div class="card-header">
            <h3>{{$client->clientName}}</h3>
        </div>
        <div class="card-body">
            <h5>{{$client->status}}</h5>
            <p class="card-text">{!! $client->clientComments !!}</p>
            <a class="btn btn-primary" target="_blank" href="https://www.google.fr/">{{$client->urlSite}}</a>
        </div>
    </div>
@endsection