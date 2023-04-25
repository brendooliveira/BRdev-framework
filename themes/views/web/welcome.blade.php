@extends('web.theme')
@section('content')
    <div class="container mt-5 text-center">
        <div class="card">
            <div class="card-body">
                <h2>Brdev Framework.</h2>
                <p>version <b>1.1</b> PHP {{ phpversion() }}</p>
            </div>
        </div>
    </div>
@endsection