<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;
use App\Http\Requests\BookUpdateRequest;


class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:pentadbir', ['only' => [
            'create', 'store', 'edit', 'update', 'destroy'
        ]]);
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('books.senarai', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.daftar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'title'         => 'required',
            'isbn'          => 'required|unique:books',
            'author'        => 'required',
            'published_date'=> 'required',
            'quantity'      => 'required|numeric',
            'description'   => 'required|min:10',
        ];

        $custommsg = [
            'title.required'            => 'Sila masukkan tajuk',
            'isbn.required'             => 'Sila masukkan ISBN',
            'isbn.unique'               => 'ISBN telah wujud',
            'author.required'           => 'Sila masukkan pengarang',
            'published_date.required'   => 'Sila pilih tarikh diterbit',
            'quantity.required'         => 'Nyatakan bilangan buku',
            'quantity.numeric'          => 'Nombor sahaja',
            'description.required'      => 'Sila masukkan maklumat berkaitan',
            'description.min'           => 'Harus melebihi 10 aksara'
        ];
        
        $this->validate($request, $rules, $custommsg);


        $published_date = date("Y-m-d", strtotime(request('published_date')));

        // $book = new Book();
        // $book->isbn = request('isbn');
        // $book->title = request('title');
        // $book->description = request('description');
        // $book->published_date = $published_date;
        // $book->author = request('author');
        // $book->quantity = request('quantity');
        // $book->save();

        //other way
        $book = new Book(array(
            'isbn' => request('isbn'),
            'title' => request('title'),
            'description' => request('description'),
            'published_date' => $published_date,
            'author' => request('author'),
            'quantity' => request('quantity')
        ));
        $book->save();

        //sweetalert
        $msg = '<script>swal({';
        $msg .= 'type: "success",';
        $msg .= 'title: "Berjaya!",';
        $msg .= 'text: "Buku baru telah disimpan!",';
        $msg .= 'showConfirmButton: false,';
        $msg .= 'timer: 3000,';
        $msg .= '});</script>';
        //return to previous page
        // return back();
        // dd($msg);
        
        //sweetalert
        return redirect()->route('book.index')->with('status', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $books = Book::find($id);
        $books = Book::findorFail($id);

        return view( 'books.papar', compact('books'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $books = Book::findorFail($id);
        
        return view('books.kemaskini', compact('books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookUpdateRequest $request, $id)
    {
        // dd($id);
        $published_date = date("Y-m-d", strtotime(request('published_date')));

        $book = Book::find($id)->update([
            'isbn' => request('isbn'),
            'title' => request('title'),
            'description' => request('description'),
            'published_date' => $published_date,
            'author' => request('author'),
            'quantity' => request('quantity'),
        ]);

        //other way
        // $book = Book::find($id);
        // $book->isbn = request('isbn');
        // $book->title = request('title');
        // $book->description = request('description');
        // $book->published_date = $published_date;
        // $book->author = request('author');
        // $book->quantity = request('quantity');
        // $book->avail_qty = request('quantity');
        // $book->save();

        //sweetalert
        $msg = '<script>swal({';
        $msg .= 'type: "success",';
        $msg .= 'title: "Berjaya!",';
        $msg .= 'text: "Buku baru telah dikemaskini!",';
        $msg .= 'showConfirmButton: false,';
        $msg .= 'timer: 3000,';
        $msg .= '});</script>';

        return redirect()->route('book.index')->with('status', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 
        // dd($id);
        Book::find($id)->delete();

        $msg = '<script>swal({';
        $msg .= 'type: "success",';
        $msg .= 'title: "Rekod Dihapus!",';
        $msg .= 'showConfirmButton: false,';
        $msg .= 'timer: 3000,';
        $msg .= '});</script>';
// dd($id);
        return redirect()->route('book.index')->with('status', $msg);
    }
}
