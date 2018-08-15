@extends('layouts.app')

@section('content')
    <h1 class="text-center">Ajouter un client</h1>

    <div class="formcreate container">
        {!! Form::open(['action' => 'ClientsController@store', 'method'=>'POST', 'class'=>'needs-validation']) !!}
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="form-group">
                    {{Form::label('clientName','Nom du Client')}}
                    {{Form::text('clientName','',['class'=>'form-control','placeholder'=>'Nom du client'])}}
                </div>
                <div class="form-group">
                    {{Form::label('clientName','Mail du Client')}}
                    {{Form::email('clientMail','',['class'=>'form-control','placeholder'=>'Mail du client'])}}
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