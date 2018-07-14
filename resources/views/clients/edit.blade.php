@extends('layouts.app')

@section('content')
    <h1 class="text-center">Modifier un client</h1>
    <div class="container formcreate">
        {!! Form::open(['action' => ['ClientsController@update', $client->id], 'method'=>'POST']) !!}
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{Form::label('clientName','Nom du Client')}}
                    {{Form::text('clientName',$client->clientName,['class'=>'form-control','placeholder'=>'Nom du client'])}}
                </div>
                <div class="form-group">
                    {{Form::label('clientName','Mail du Client')}}
                    {{Form::email('clientMail',$client->clientMail,['class'=>'form-control','placeholder'=>'Mail du client'])}}
                </div>
                <div class="form-group">
                    {{Form::label('priority','Priorité')}}
                    {{Form::number('priority',$client->priority,['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('status','Status')}}
                    {{Form::select('status',['A demarrer'=>'A démarrer ','En cours'=>'En cours','Terminé'=>'Terminé'],$client->status,['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('urlSite','Url du site')}}
                    {{Form::text('urlSite',$client->urlSite,['class'=>'form-control','placeholder'=>'Url du Site'])}}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{Form::label('numberParticipants','Nombre de participants')}}
                    {{Form::number('numberParticipants',$client->numberParticipants,['class'=>'form-control','placeholder'=>'Nombre de participants'])}}
                </div>
                <div class="form-group">
                    {{Form::label('country','langue du site')}}
                    {{Form::text('country',$client->country,['class'=>'form-control','placeholder'=>'Langue du site'])}}
                </div>
                <div class="form-group">
                    {{Form::label('loginAdmin','Login de l\'admin')}}
                    {{Form::text('loginAdmin',$client->loginAdmin,['class'=>'form-control','placeholder'=>'Login de l\'admin'])}}
                </div>
                <div class="form-group">
                    {{Form::label('passwordAdmin','Mot de passe de l\'admin')}}
                    {{Form::text('passwordAdmin',$client->passwordAdmin,['class'=>'form-control','placeholder'=>'Mot de passe de l\'admin'])}}
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