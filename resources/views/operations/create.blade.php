@extends('layouts.app')

@section('content')
    <h1 class="text-center">Ajouter une operation</h1>
    <div class="formcreate container">
        {!! Form::open(['action' => 'OperationsController@store', 'method'=>'POST', 'class'=>'needs-validations'])!!}
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{Form::label('client_id','Nom du client')}}
                    {{Form::select('client_id',$client,'',['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('url','Url de l\'operation')}}
                    {{Form::text('url','',['class'=>'form-control','placeholder'=>'Url de l\'operation'])}}
                </div>
                <div class="form-group">
                    {{Form::label('numberParticipant','Nombre de participants')}}
                    {{Form::number('numberParticipant','',['class'=>'form-control','placeholder'=>'Nombre de participants'])}}
                </div>
                <div class="form-group">
                    {{Form::label('lang','Langue de l\'operation')}}
                    {{Form::select('lang',['france'=>'Française','spain'=>'Espagnole','deutsche'=>'Allemande','english'=>'Anglaise'],null,['class'=>'form-control custom-select'])}}
                </div>
                <div class="form-group collapse" id="langCollapse">
                    {{Form::label('lang','2eme Langue de l\'operation')}}
                    {{Form::select('lang',['france'=>'Française','spain'=>'Espagnole','deutsche'=>'Allemande','english'=>'Anglaise'],null,['class'=>'form-control custom-select'])}}
                </div>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#langCollapse">ajouter une langue</button>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{Form::label('status','Status')}}
                    {{Form::select('status',['A demarrer'=>'A démarrer ','En cours'=>'En cours','Terminé'=>'Terminé'],null,['class'=>'form-control custom-select'])}}
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
        {{Form::submit('Ajouter',['class'=>'btn btn-primary btn-block mt-4'])}}
        {!! Form::close() !!}
    </div>
@endsection