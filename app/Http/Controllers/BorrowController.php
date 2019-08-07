<?php

namespace App\Http\Controllers;

use DB;
use App\Borrow;
use App\Book;
use App\Course;

use Auth;

use App\Mail\PermohonanMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class BorrowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:pentadbir', [
            'only' => ['edit', 'update', 'destroy']
        ]);

        $this->middleware('role:pemohon', [
            'only' => ['create', 'store']
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::user()->student->id);

        if ( Auth::user()->hasRole('pemohon'))
        {
            //senarai pinjam
            $pinjam = Borrow::with('student.user')
                    ->where('student_id', Auth::user()->student->id)
                    ->whereStatus('1')
                    ->get();

            //senarai mohon
            $mohon = Borrow::with('student.user')
                    ->where('student_id', Auth::user()->student->id)
                    ->whereStatus('0')
                    ->get();

            //senarai pulang
            $pulang = Borrow::with('student.user')
                    ->where('student_id', Auth::user()->student->id)
                    ->whereStatus('2')
                    ->get();
        }
        else
        {
            $pinjam = Borrow::with('student.user')
                    ->whereStatus('1')
                    ->get();

            //senarai mohon
            $mohon = Borrow::with('student.user')
                    ->whereStatus('0')
                    ->get();

            //senarai pulang
            $pulang = Borrow::with('student.user')
                    ->whereStatus('2')
                    ->get();
        }
        
        // dd($pinjam[0]->student->student_no);
        return view('borrow.senarai')->with([
            'pinjam' => $pinjam,
            'mohon' => $mohon,
            'pulang' => $pulang,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();        
        $course = Course::find(Auth::user()->student->course_id);
        
        return view('borrow.daftar')->with([
            'books' => $books,
            'course' => $course,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $books = $request->book_id;

        $borrow = Borrow::create([
            'slug' => uniqid(),
            'student_id' => Auth::user()->student->id,
        ]);

        $borrow->book()->attach($books);
        $url = route('borrow.index');

        Mail::to('test@example.com')->send(new PermohonanMail($borrow, $url));

        //sweetalert
        $msg = '<script>swal({';
        $msg .= 'type: "success",';
        $msg .= 'title: "Berjaya!",';
        $msg .= 'text: "Permohonan Telah Dihantar!",';
        $msg .= 'showConfirmButton: false,';
        $msg .= 'timer: 3000,';
        $msg .= '});</script>';

        return redirect()->route('borrow.index')->with('status', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {
        //betul
        // dd($borrow->student->user->name);

        
        //current user hanya boleh view permohonan sendiri
        if ( Auth::user()->hasRole('pemohon'))
        {
            abort_if($borrow->student_id !== Auth::user()->student->id, 403);
        }
        
        return view('borrow.papar')->with('borrow', $borrow);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrow $borrow, $flag)
    {
        return view('borrow.kemaskini', compact('borrow', 'flag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrow $borrow)
    {

        $borrow->update($request->all());
        
        //sweetalert
        if ($request->status == '1')
        {
            $msg = '<script>swal({';
            $msg .= 'type: "success",';
            $msg .= 'title: "Permohonan Diluluskan!",';
            $msg .= 'text: "Permohonan Pinjaman diluluskan",';
            $msg .= 'showConfirmButton: false,';
            $msg .= 'timer: 3000,';
            $msg .= '});</script>';
        }
        elseif ($request->status == '2')
        {
            $msg = '<script>swal({';
            $msg .= 'type: "success",';
            $msg .= 'title: "Pemulangan Pinjaman!",';
            $msg .= 'text: "Pinjaman Buku telah dipulangkan",';
            $msg .= 'showConfirmButton: false,';
            $msg .= 'timer: 3000,';
            $msg .= '});</script>';
        }
        

        return redirect()->route('borrow.index')->with('status', $msg);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrow $borrow)
    {
        //
    }
}
