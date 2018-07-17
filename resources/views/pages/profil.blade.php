@extends('layouts.app')
@section('content')
    <h2 class="text-center">profil</h2>
    <div class="card">
        <div class="card-header">
            <h3>
                {{Auth::user()->name}}
            </h3>
        </div>
        <div class="card-body">
            <p>
               Mail : {{Auth::user()->email}}
            </p>
            <p>
                Team : {{Auth::user()->team}}
            </p>
        </div>
    </div>
@endsection