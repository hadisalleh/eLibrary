@extends('layouts.main')

@section('content')
    <form name="kemaskinistatus" action="{{ route('borrow.update', $borrow->id) }}" method="post" >
        @csrf
        @method('PUT')

        @if ($flag == 'borrowed')
            <input type="hidden" name="borrowed_date" value={{ date("Y-m-d") }}>
            <input type="hidden" name="status" value="1">
        @else
            <input type="hidden" name="returned_date" value={{ date("Y-m-d") }}>
            <input type="hidden" name="status" value="2">
        @endif
        
    </form>
@section('script')
    <script>
        $(document).ready(function() {
            document.kemaskinistatus.submit();
        });
    </script>
@endsection
