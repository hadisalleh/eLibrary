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
                            <h4 class="card-title text-white">Borang Permohonan</h4>
                        </div>
                    </div>
                    <div class="card-body ">
                        <fieldset>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-10">
                                        {{-- <p class="form-control-static">Nama Student (IC)</p> --}}
                                        <p class="form-control-static">{{ Auth::user()->name }} ({{ Auth::user()->student->student_no }}) </p>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Program</label>
                                    <div class="col-sm-10">
                                        {{-- <p class="form-control-static">CodeCourse - Nama course</p> --}}
                                        <p class="form-control-static">{{ $course->code }} - {{ $course->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card border-mute">
                                    <div class="card-header">
                                        <div class="alert" style="background-color:#FF8800">
                                            <h5 class="card-title text-white">Maklumat Pinjaman</h5>
                                        </div>
                                        {{-- <input type="hidden" name="ranid" id="ranid" value="{{ $maklumat->id }}"> --}}
                                        <div class="card-body">
                                            <fieldset>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label">Sila pilih buku</label>
                                                        <div class="col-sm-10">
                                                            <select name="book_id[]" class="form-control multi-select" multiple="" id="senaraibuku">
                                                                @foreach ($books as $book)
                                                                    <option value={{ $book->id }}>{{ $book->title }}</option>
                                                                @endforeach
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
                        <button type="submit" class="btn btn-info btn-fill pull-right">Hantar</button>
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

    <script>
        // Multiselect untuk buku
        $('#senaraibuku').multiSelect({
                selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='Senarai Buku'>",
                selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='Senarai Buku Dipinjam'>",
                afterInit: function (ms) {
                    var that = this,
                    $selectableSearch = that.$selectableUl.prev(),
                    $selectionSearch = that.$selectionUl.prev(),
                    selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                    selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';
                    
                    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                    .on('keydown', function (e) {
                        if (e.which === 40) {
                            that.$selectableUl.focus();
                            return false;
                        }
                    });
                    
                    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                    .on('keydown', function (e) {
                        if (e.which == 40) {
                            that.$selectionUl.focus();
                            return false;
                        }
                    });                    
                },
                afterSelect: function () {
                    this.qs1.cache();
                    this.qs2.cache();
                },
                afterDeselect: function () {
                    this.qs1.cache();
                    this.qs2.cache();
                }
                
            });
    </script>
@endsection
