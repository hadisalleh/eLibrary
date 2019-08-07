{{-- ady -> step4 --}}
{{--
@extends('master.layout')

@section('kandungan')
    <div class="title m-b-md">
        Home Page
    </div>
    <h3>This is Homepage</h3>
@endsection
--}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 text-center">
                <img src="{{ asset('img/moe.png') }}">
                <h1 class="card-title text-light">Sistem eLibrary</h1>
                {{-- <h1 class="card-title text-light">Sistem eLibrary {{ $person }} </h1> --}}
                <h4 class="card-text text-light mt-4">Kementerian Pendidikan Malaysia </h4>
                
            </div>
            
        </div>
    </div>
@endsection
{{-- ady -> step4 --}}



