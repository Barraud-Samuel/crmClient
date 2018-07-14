@extends('layouts.app')

@section('content')
    <h1 class="text-center">Ajouter un client</h1>

    <div class="formcreate container">
        {!! Form::open(['action' => 'ClientsController@store', 'method'=>'POST', 'class'=>'needs-validation']) !!}
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{Form::label('clientName','Nom du Client')}}
                    {{Form::text('clientName','',['class'=>'form-control','placeholder'=>'Nom du client'])}}
                </div>
                <div class="form-group">
                    {{Form::label('clientName','Mail du Client')}}
                    {{Form::email('clientMail','',['class'=>'form-control','placeholder'=>'Mail du client'])}}
                </div>
                <div class="form-group">
                    {{Form::label('priority','Priorité')}}
                    {{Form::number('priority',null,['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('status','Status')}}
                    {{Form::select('status',['A demarrer'=>'A démarrer ','En cours'=>'En cours','Terminé'=>'Terminé'],null,['class'=>'form-control custom-select'])}}
                </div>
                <div class="form-group">
                    {{Form::label('urlSite','Url du site')}}
                    {{Form::text('urlSite','',['class'=>'form-control','placeholder'=>'Url du Site'])}}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{Form::label('numberParticipants','Nombre de participants')}}
                    {{Form::number('numberParticipants',null,['class'=>'form-control','placeholder'=>'Nombre de participants'])}}
                </div>
                <div class="form-group">
                    {{Form::label('country','langue du site')}}
                    {{Form::text('country','',['class'=>'form-control','placeholder'=>'Langue du site'])}}
                </div>
                <div class="form-group">
                    {{Form::label('loginAdmin','Login de l\'admin')}}
                    {{Form::text('loginAdmin','',['class'=>'form-control','placeholder'=>'Login de l\'admin'])}}
                </div>
                <div class="form-group">
                    {{Form::label('passwordAdmin','Mot de passe de l\'admin')}}
                    {{Form::text('passwordAdmin','',['class'=>'form-control','placeholder'=>'Mot de passe de l\'admin'])}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group text-center">
                    {{Form::label('clientComments','Commentaire sur le client/opération')}}
                    {{Form::textarea('clientComments','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Commentaire sur le client/opération'])}}
                </div>
            </div>
        </div>

        {{Form::submit('Ajouter',['class'=>'btn btn-primary btn-block'])}}
        {!! Form::close() !!}
    </div>





@endsection