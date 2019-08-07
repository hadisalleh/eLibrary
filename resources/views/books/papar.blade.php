@extends('layouts.main')

@section('content')
    {{-- <h1>This is Paparan</h1> --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <form method="post" action="{{ route('book.store') }}" class="form-horizontal">
                    @csrf
                    <div class="card-header ">
                        <div class="alert" style="background-color:#2BBBAD">
                            <h4 class="card-title text-white">Maklumat Buku {{ $books->title }} </h4>
                        </div>
                    </div>
                    <div class="card-body ">
                        <fieldset>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Tajuk</label>
                                    <div class="col-sm-10">
                                        <p class="form-control-static">{{ $books->title }}</p>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">ISBN</label>
                                    <div class="col-sm-3">
                                        <p class="form-control-static">{{ $books->isbn }}</p>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Pengarang</label>
                                    <div class="col-sm-10">
                                        <p class="form-control-static">{{ $books->author }}</p>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Tarikh Diterbit</label>
                                    <div class="col-sm-3">
                                        <p class="form-control-static">{{ date("d F Y", strtotime($books->published_date)) }}</p>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Jumlah</label>
                                    <div class="col-sm-2">
                                        <p class="form-control-static">{{ $books->quantity }}</p>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Keterangan</label>
                                    <div class="col-sm-10">
                                        <p class="form-control-static">{{ $books->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </fieldset>                        
                    </div>
                </form>
                <div class="card-footer text-right">
                    <button type="button" class="btn btn-secondary btn-outline pull-left" onclick="location.href='{{ route('book.index') }}';"><i class="fa fa-arrow-left"></i> Kembali</button>
                    @role('pentadbir')
                        <button type="button" class="btn btn-danger btn-fill " onclick="event.preventDefault(); delalert();">Hapus</button>
                        <button type="button" class="btn btn-info btn-fill" onclick="location.href='{{ route('book.edit', $books->id) }}';">Kemaskini</button>
                    @endrole
                    <div class="clearfix"></div>
                </div>
            </div>
            {{-- untuk destroy form -> pass method=delete --}}
            <form id="delForm" method="POST" action="{{ route('book.destroy', $books->id) }}" style="display: none;">
                @csrf
                @method('DELETE')
            </form>          
        </div>
    </div>
@endsection

@section('script')
    <script>
        // delete confirmation
        function delalert() {
            swal({
                title: "Hapus Rekod!",
                text: "Anda pasti ingin meneruskan?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn btn-info btn-fill",
                confirmButtonText: "Ya",
                cancelButtonClass: "btn btn-danger btn-fill",
                cancelButtonText: "Tidak",
                closeOnConfirm: false,
                reverseButtons: true,
                allowOutsideClick: false
            }, function() {
                document.getElementById('delForm').submit();
            });
        }
    </script>
@endsection