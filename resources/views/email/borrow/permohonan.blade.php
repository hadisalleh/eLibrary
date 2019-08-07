@component('mail::message')
# PERMOHONAN PINJAMAN BARU
<br>
<strong>Tuan/Puan</strong>

<p>Berikut merupakan maklumat permohonan pinjaman baru untuk tindakan tuan/puan.</p>
<p>&emsp;No Permohonan : <strong>{{ $borrow->slug }}</strong></p>
<p>&emsp;Nama : <strong>{{ $borrow->student->user->name }} ({{ $borrow->student->student_no }})</strong></p>
<p>&emsp;Tarikh Permohonan : <strong>{{ date("d F Y", strtotime($borrow->created_at)) }}</strong></p>

<p>Senarai Buku:</p>
<p>
    <ul>
        @foreach ($borrow->book  as $item)
            <li>{{ $item->title }}</li>
        @endforeach
    </ul>
</p>

@component('mail::button', ['url' => $url])
Sistem eLibrary
@endcomponent

Sekian, Terima kasih<br>
{{ config('app.name') }}
@endcomponent
