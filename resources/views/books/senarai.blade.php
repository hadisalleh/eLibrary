@extends('layouts.main')

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card data-tables">
                <div class="card-header">
                    {{-- <h4 class="card-title">Senarai Keseluruhan Buku</h4> --}}
                    <div class="alert" style="background-color:#2BBBAD">
                        <h4 class="card-title text-white">Senarai Buku</h4>
                    </div>
                </div>
                <div class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="fresh-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Tajuk</th>
                                    <th>ISBN</th>
                                    <th>Pengarang</th>
                                    <th class="disabled-sorting text-right">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- ady_senarai -> step1 --}}
                                {{-- <tr>
                                    <td>Tajuk Buku Disini</td>
                                    <td>ISBN Disini</td>
                                    <td>Pengarang Disini</td>
                                    <td class="text-right">
                                        <a href="#" class="btn btn-link btn-info edit"><i class="fa fa-edit"></i></a>
                                        <a href="#" class="btn btn-link btn-danger remove"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr> --}}
                                @empty(!$books)
                                    @foreach ($books as $book)
                                        <tr>
                                            <td> {{ $book->title }} </td>
                                            <td> {{ $book->isbn }} </td>
                                            <td> {{ $book->author }} </td>
                                            <td class="text-right">
                                                <a href="{{ route('book.show', $book->id) }}" class="btn btn-link btn-success" data-toggle="tooltip" title="Papar"><i class="fa fa-eye"></i></a>
                                                {{-- role and permission --}}
                                                @role('pentadbir')
                                                    <a href="{{ route('book.edit', $book->id) }}" class="btn btn-link btn-info" data-toggle="tooltip" title="Kemaskini"><i class="fa fa-edit"></i></a>
                                                    {{-- asal --}}
                                                    {{-- <a href="{{ route('book.destroy', $book->id) }}" onclick="event.preventDefault(); document.getElementById('delForm').submit();" class="btn btn-link btn-danger" data-toggle="tooltip" title="Hapus"><i class="fa fa-times"></i></a> --}}
                                                    {{-- ubah utk sweetalert --}}
                                                    @php
                                                        $bookid = $book->id
                                                    @endphp
                                                    <a href="{{ route('book.destroy', $bookid) }}" onclick="event.preventDefault(); delalert();" class="btn btn-link btn-danger" data-toggle="tooltip" title="Hapus"><i class="fa fa-times"></i></a>
                                                @endrole
                                            </td>
                                        </tr>
                                    @endforeach    
                                @endempty                                
                                {{-- ady_senarai -> step1 end--}}
                            </tbody>
                            {{-- <tbody>
                                <tr>
                                    <td>Tajuk Buku Disini</td>
                                    <td>ISBN Disini</td>
                                    <td>Pengarang Disini</td>
                                    <td class="text-right">
                                        <a href="#" class="btn btn-link btn-info edit"><i class="fa fa-edit"></i></a>
                                        <a href="#" class="btn btn-link btn-danger remove"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            </tbody> --}}
                        </table>
                        @isset($bookid)
                            <form id="delForm" method="POST" action="{{ route('book.destroy', $bookid) }}" style="display: none;">
                                @csrf
                                {{-- {{dd('hello')}} --}}
                                @method('DELETE')
                            </form>
                        @endisset
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

            $('#datatables').DataTable({
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

            var table = $('#datatables').DataTable();

            // Edit record
            // table.on('click', '.edit', function() {
            //     $tr = $(this).closest('tr');

            //     if ($tr.hasClass('child')) {
            //         $tr = $tr.prev('.parent');
            //     }

            //     var data = table.row($tr).data();
            //     alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
            // });

            // Delete a record
            // table.on('click', '.remove', function(e) {
            //     $tr = $(this).closest('tr');
            //     table.row($tr).remove().draw();
            //     e.preventDefault();
            // });
        });

        // delete confirmation
        function delalert() {
            swal({
                title: "Hapus Rekod!",
                text: "Anda pasti ingin meneruskan?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn btn-danger btn-fill",
                confirmButtonText: "Ya",
                cancelButtonClass: "btn btn-info btn-fill",
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
