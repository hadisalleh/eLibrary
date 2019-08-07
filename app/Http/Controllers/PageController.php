<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function contact(){
        return view('contact');
    }

    public function detail(){
        $bukuit = [
            'Buku Laravel',
            'Buku Java',
            'Buku PHP'
        ];

        $tajuk = 'IT';

        return view('detail', compact('bukuit','tajuk'));
    }
}
