@extends('layouts.app')

@section('content')
    <h1 class="text-center">Modifier cette operation</h1>
    <div class="formcreate container">
        {!! Form::open(['action' => ['OperationsController@update', $operation->id ],'method'=>'POST', 'class'=>'needs-validations'])!!}
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{Form::label('client_id','Nom du client')}}
                    {{Form::select('client_id',$client,$operation->client_id,['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('url','Url de l\'operation')}}
                    {{Form::text('url',$operation->url,['class'=>'form-control','placeholder'=>'Url de l\'operation'])}}
                </div>
                <div class="form-group">
                    {{Form::label('numberParticipant','Nombre de participants')}}
                    {{Form::number('numberParticipant',$operation->numberParticipants,['class'=>'form-control','placeholder'=>'Nombre de participants'])}}
                </div>
                <div class="form-group">
                    {{Form::label('lang','Langue de l\'operation')}}
                    {{Form::select('lang',['france'=>'Française','spain'=>'Espagnole','deutsche'=>'Allemande','english'=>'Anglaise'],$operation->lang,['class'=>'form-control custom-select'])}}
                </div>
                <div class="form-group collapse" id="langCollapse">
                    {{Form::label('langSecond','2eme Langue de l\'operation')}}
                    {{Form::select('langSecond',['france'=>'Française','spain'=>'Espagnole','deutsche'=>'Allemande','english'=>'Anglaise'],$operation->langSecond,['class'=>'form-control custom-select'])}}
                </div>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#langCollapse">modifier la seconde langue</button>
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
        {!! Form::hidden('_method','PUT') !!}
        {{Form::submit('modifier',['class'=>'btn btn-primary btn-block mt-4'])}}
        {!! Form::close() !!}
    </div>
@endsection