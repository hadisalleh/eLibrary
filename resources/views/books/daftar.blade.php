@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <form method="post" action="{{ route('book.store') }}" class="form-horizontal">
                    @csrf
                    <div class="card-header ">
                        <div class="alert" style="background-color:#4285F4">
                            <h4 class="card-title text-white">Daftar Buku</h4>
                        </div>
                    </div>
                    <div class="card-body ">
                        <fieldset>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Tajuk</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                        <small class="text-danger">{{ $errors->first('title') }}</small>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">ISBN</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="isbn" value="{{ old('isbn') }}">
                                        <small class="text-danger">{{ $errors->first('isbn') }}</small>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Pengarang</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="author" class="form-control" value="{{ old('author') }}">
                                        <small class="text-danger">{{ $errors->first('author') }}</small>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Tarikh Diterbit</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control datepicker" name="published_date" id="datetimepicker" value="{{ old('published_date') }}">
                                        <small class="text-danger">{{ $errors->first('published_date') }}</small>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Jumlah</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="quantity" value="{{ old('quantity') }}">
                                        <small class="text-danger">{{ $errors->first('quantity') }}</small>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Keterangan</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="10" style="height:100%; resize:none;" name="description">{{ old('description') }}</textarea>
                                        <small class="text-danger">{{ $errors->first('description') }}</small>
                                    </div>
                                </div>
                            </div>
                        </fieldset>                        
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-info btn-fill pull-right">Daftar</button>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>            
        </div>
    </div>
@endsection

@section('script')
    {{-- papar sweet alert selepas redirect --}}
    @if(session('status'))
        {!! session('status') !!}
    @endif
@endsection
