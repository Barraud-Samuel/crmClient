@extends('layouts.app')

@section('content')
    <h1 class="text-center">Ajouter une operation</h1>

    <div class="formcreate container">
        {!! Form::open(['action' => 'OperationsController@store', 'method'=>'POST', 'class'=>'needs-validations'])!!}
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{Form::label('url','Nom du Client')}}
                    {{Form::text('url','',['class'=>'form-control','placeholder'=>'Nom du client'])}}
                </div>
            </div>
        </div>
        {{Form::submit('Ajouter',['class'=>'btn btn-primary btn-block'])}}
        {!! Form::close() !!}
    </div>
@endsection