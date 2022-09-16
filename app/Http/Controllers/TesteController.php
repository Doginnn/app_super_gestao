<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $p1, int $p2)
    {
//        echo "A soma de $p1 + $p2 é: " . ($p1 + $p2);

//        return view('site.teste', ['p1' => $p1, 'p2' => $p2]); //Array associativo

//        return view('site.teste')
//            ->with('abc', $p1)
//            ->with('def', $p2); //Método With

        return view('site.teste', compact('p1', 'p2')); //Função compact()
    }
}
