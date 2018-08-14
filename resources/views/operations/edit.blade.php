@extends('layouts.app')

@section('content')
    <h1 class="text-center">Modifier cette operation</h1>
    <div class="formcreate container">
        {!! Form::open(['action' => 'OperationsController@store', 'method'=>'POST', 'class'=>'needs-validations'])!!}
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{Form::label('clientName','Nom du client')}}
                    {{Form::select('status',$client,$operation->client_id,['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('url','Url de l\'operation')}}
                    {{Form::text('url',$operation->url,['class'=>'form-control','placeholder'=>'Url de l\'operation'])}}
                </div>
                <div class="form-group">
                    {{Form::label('lang','Langue de l\'operation')}}
                    {{Form::select('lang',['france'=>'Française','spain'=>'Espagnole','deutsche'=>'Allemande','english'=>'Anglaise'],$operation->lang,['class'=>'form-control custom-select'])}}
                </div>
                <div class="form-group">
                    {{Form::label('numberParticipant','Nombre de participants')}}
                    {{Form::number('numberParticipant',$operation->numberParticipants,['class'=>'form-control','placeholder'=>'Nombre de participants'])}}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{Form::label('status','Status')}}
                    {{Form::select('status',['A demarrer'=>'A démarrer ','En cours'=>'En cours','Terminé'=>'Terminé'],$operation->status,['class'=>'form-control custom-select'])}}
                </div>
                <div class="form-group">
                    {{Form::label('loginAdmin','Login de l\'admin')}}
                    {{Form::text('loginAdmin',$operation->loginAdmin,['class'=>'form-control','placeholder'=>'Login de l\'admin'])}}
                </div>
                <div class="form-group">
                    {{Form::label('passwordAdmin','Mot de passe de l\'admin')}}
                    {{Form::text('passwordAdmin',$operation->passwordAdmin,['class'=>'form-control','placeholder'=>'Mot de passe de l\'admin'])}}
                </div>
            </div>
        </div>
        {{Form::submit('Ajouter',['class'=>'btn btn-primary btn-block'])}}
        {!! Form::close() !!}
    </div>
@endsection