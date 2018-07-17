@extends('layouts.app')
@section('content')
    <h2 class="text-center">profil</h2>
    <div class="card">
        <div class="card-header">
            <p>
                {{Auth::user()->name}}
            </p>
        </div>
        <div class="card-body">
            <p>
                {{Auth::user()->email}}
            </p>
        </div>
    </div>
@endsection