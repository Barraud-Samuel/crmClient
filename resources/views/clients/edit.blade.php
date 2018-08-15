@extends('layouts.app')

@section('content')
    <h1 class="text-center">Modifier un client</h1>
    <div class="container formcreate">
        {!! Form::open(['action' => ['ClientsController@update', $client->id], 'method'=>'POST']) !!}
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="form-group">
                    {{Form::label('clientName','Nom du Client')}}
                    {{Form::text('clientName',$client->clientName,['class'=>'form-control','placeholder'=>'Nom du client'])}}
                </div>
                <div class="form-group">
                    {{Form::label('clientName','Mail du Client')}}
                    {{Form::email('clientMail',$client->clientMail,['class'=>'form-control','placeholder'=>'Mail du client'])}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group text-center">
                    <div class="form-group">
                        {{Form::label('clientComments','Commentaire sur le client/opération')}}
                        {{Form::textarea('clientComments',$client->clientComments,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Commentaire sur le client/opération'])}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Form::hidden('_method','PUT') !!}
    {{Form::submit('Submit',['class'=>'btn btn-primary btn-block'])}}
    {!! Form::close() !!}
@endsection