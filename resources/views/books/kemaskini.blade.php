@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <form method="post" action="{{ route('book.update', $books->id) }}" class="form-horizontal">
                    @method('PUT')
                    @csrf
                    <div class="card-header ">
                        <div class="alert" style="background-color:#4285F4">
                            <h4 class="card-title text-white">Kemaskini Buku: {{ $books->title }}</h4>
                        </div>
                    </div>
                    <div class="card-body ">
                        <fieldset>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Tajuk</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="title" value="{{ $books->title }}">
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
                                        <input type="text" class="form-control" name="isbn" value="{{ $books->isbn }}">
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
                                        <input type="text" name="author" class="form-control" value="{{ $books->author }}">
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
                                        <input type="text" class="form-control datepicker" name="published_date" id="datetimepicker" value="{{ date("m-d-Y", strtotime($books->published_date)) }}">
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
                                        <input type="text" class="form-control" name="quantity" value="{{ $books->quantity }}">
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
                                        <textarea class="form-control" rows="10" style="height:100%; resize:none;" name="description">{{ $books->description }}</textarea>
                                        <small class="text-danger">{{ $errors->first('description') }}</small>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="card-footer text-right">
                        {{-- training note -> hanya tukar ke cara kedua selepas setup BookController@show --}}
                        <button type="button" class="btn btn-secondary btn-fill pull-left" onclick="location.href='{{ route('book.index') }}';">Kembali</button>
                        {{-- <button type="button" class="btn btn-secondary btn-outline pull-left" onclick="location.href='{{ route('book.show', $books->id) }}';"><i class="fa fa-arrow-left"></i> Kembali</button> --}}
                        <button type="submit" class="btn btn-info btn-fill pull-right">Kemaskini</button>
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