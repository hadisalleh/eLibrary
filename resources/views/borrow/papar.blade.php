@extends('layouts.main')

@section('style')
    {{-- multiselect purpose --}}
    <link href="{{ asset('css/multi-select.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <form method="post" action="{{ route('borrow.store') }}" class="form-horizontal">
                    @csrf
                    <div class="card-header ">
                        <div class="alert" style="background-color:#4285F4">
                            <h4 class="card-title text-white">Maklumat Pinjaman</h4>
                        </div>
                    </div>
                    <div class="card-body ">
                        <fieldset>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-10">
                                        <p class="form-control-static">{{ $borrow->student->user->name }} ({{ $borrow->student->student_no }})</p>
                                        {{-- <p class="form-control-static">{{ Auth::user()->name }} ({{ Auth::user()->student->student_no }}) </p> --}}
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Program</label>
                                    <div class="col-sm-10">
                                        <p class="form-control-static">{{ $borrow->student->course->code }} - {{ $borrow->student->course->name }}</p>
                                        {{-- <p class="form-control-static">{{ $course->code }} - {{ $course->name }}</p> --}}
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Tarikh Mohon</label>
                                    <div class="col-sm-10">
                                        <p class="form-control-static">{{ date("d F Y", strtotime($borrow->created_at)) }}</p>
                                        {{-- <p class="form-control-static">{{ Auth::user()->name }} ({{ Auth::user()->student->student_no }}) </p> --}}
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Tarikh Pinjam</label>
                                    <div class="col-sm-5">
                                        <p class="form-control-static">{{ $borrow->borrowed_date? date("d F Y", strtotime($borrow->borrowed_date)) : '-' }}</p>
                                        {{-- <p class="form-control-static">{{ Auth::user()->name }} ({{ Auth::user()->student->student_no }}) </p> --}}
                                    </div>
                                    <label class="col-sm-2 control-label">Tarikh Hantar</label>
                                    <div class="col-sm-3">
                                        <p class="form-control-static">{{ $borrow->returned_date? date("d F Y", strtotime($borrow->returned_date)) : '-' }}</p>
                                        {{-- <p class="form-control-static">{{ Auth::user()->name }} ({{ Auth::user()->student->student_no }}) </p> --}}
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card border-mute">
                                    <div class="card-header">
                                        <div class="alert" style="background-color:#2BBBAD">
                                            <h5 class="card-title text-white">Senarai Buku</h5>
                                        </div>
                                        {{-- <input type="hidden" name="ranid" id="ranid" value="{{ $maklumat->id }}"> --}}
                                        <div class="card-body">
                                            <fieldset>
                                                <div class="form-group">
                                                    <div class="row">
                                                        {{-- <label class="col-sm-2 control-label">Sila pilih buku</label> --}}
                                                        <div class="col-sm-10">
                                                            <ul>
                                                                @foreach ($borrow->book as $item)
                                                                    <li><p>{{ $item->title }}</p></li>
                                                                @endforeach
                                                            </ul>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="button" class="btn btn-secondary btn-outline pull-left" onclick="location.href='{{ route('borrow.index') }}';"><i class="fa fa-arrow-left"></i> Kembali</button>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>            
        </div>
    </div>
@endsection

@section('script')
    <!-- Multiselect -->
    <script src="{!! asset('/js/plugins/jquery.multi-select.js') !!}"></script>
    <script src="{!! asset('/js/plugins/jquery.quicksearch.js') !!}"></script>

    {{-- papar sweet alert selepas redirect --}}
    @if(session('status'))
        {!! session('status') !!}
    @endif

    
@endsection
