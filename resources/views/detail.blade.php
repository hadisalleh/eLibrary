@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 text-center">
                <i class="fa fa-book text-light" style="font-size:4em"></i>
                <h1 class="card-title text-light">Maklumat Buku {{ $tajuk }} </h1>
                <h4 class="card-text text-light mt-4">
                    @foreach ($bukuit as $item)
                        <li>{{ $item }}</li>                        
                    @endforeach
                </h4>
            </div>
            
        </div>
    </div>
@endsection
{{-- ady -> step4 --}}