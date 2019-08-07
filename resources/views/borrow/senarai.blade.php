@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card data-tables">
                <div class="card-header">
                    <div class="alert" style="background-color:#33b5e5">
                        <h4 class="card-title text-white">Senarai Pinjaman</h4>
                    </div>
                </div>
                <div class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                    <div class="fresh-datatables">
                        <table id="tblpinjam" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No Permohonan</th>
                                    <th>Tarikh Mohon</th>
                                    <th>Nama</th>
                                    <th class="disabled-sorting text-right">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pinjam as $item)
                                    <tr>
                                        <td>{{ $item->slug}}</td>
                                        <td>{{ date("d F Y", strtotime($item->created_at)) }}</td>
                                        <td>{{ $item->student->user->name }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('borrow.show', $item->id) }}" class="btn btn-link btn-success" data-toggle="tooltip" title="Papar"><i class="fa fa-eye"></i></a>
                                            @role('pentadbir')
                                                <a href="{{ route('borrow.edit', [$item->id, 'returned']) }}" class="btn btn-link btn-info" data-toggle="tooltip" title="Pemulangan"><i class="fa fa-undo"></i></a>
                                            @endrole
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card data-tables">
                <div class="card-header">
                    <div class="alert" style="background-color:#ffbb33">
                        <h4 class="card-title text-white">Senarai Permohonan Baru</h4>
                    </div>
                </div>
                <div class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                    <div class="fresh-datatables">
                        <table id="tblmohon" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No Permohonan</th>
                                    <th>Tarikh Mohon</th>
                                    <th>Nama</th>
                                    <th class="disabled-sorting text-right">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mohon as $item)
                                <tr>
                                    <td>{{ $item->slug}}</td>
                                    <td>{{ date("d F Y", strtotime($item->created_at)) }}</td>
                                    <td>{{ $item->student->user->name }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('borrow.show', $item->id) }}" class="btn btn-link btn-success" data-toggle="tooltip" title="Papar"><i class="fa fa-eye"></i></a>
                                        @role('pentadbir')
                                            <a href="{{ route('borrow.edit', [$item->id, 'borrowed']) }}" class="btn btn-link btn-info" data-toggle="tooltip" title="Lulus Pinjaman"><i class="fa fa-check-circle"></i></a>
                                            {{-- <a href="{{ route('borrow.create') }}" class="btn btn-link btn-info" data-toggle="tooltip" title="Lulus Pinjaman"><i class="fa fa-check-circle"></i></a> --}}
                                        @endrole
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card data-tables">
                <div class="card-header">
                    {{-- <h4 class="card-title">Senarai Keseluruhan Buku</h4> --}}
                    <div class="alert" style="background-color:#00C851">
                        <h4 class="card-title text-white">Senarai Pemulangan</h4>
                    </div>
                </div>
                <div class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                    <div class="fresh-datatables">
                        <table id="tblpulang" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No Permohonan</th>
                                    <th>Tarikh Mohon</th>
                                    <th>Nama</th>
                                    <th class="disabled-sorting text-right">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($pulang as $item)
                                    <tr>
                                        <td>{{ $item->slug}}</td>
                                        <td>{{ date("d F Y", strtotime($item->created_at)) }}</td>
                                        <td>{{ $item->student->user->name }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('borrow.show', $item->id) }}" class="btn btn-link btn-success" data-toggle="tooltip" title="Papar"><i class="fa fa-eye"></i></a>
                                            {{-- <a href="{{ route('borrow.edit', $item->id) }}" class="btn btn-link btn-info" data-toggle="tooltip" title="Kemaskini"><i class="fa fa-edit"></i></a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            // enable tooltip - popper
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            });

            // $('#datatables').DataTable({
            $('table').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [5, 10, 25, -1],
                    [5, 10, 25, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Carian",
                }

            });
        });

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

    {{-- papar sweet alert selepas redirect --}}
    @if(session('status'))
        {!! session('status') !!}
    @endif
    
@endsection
