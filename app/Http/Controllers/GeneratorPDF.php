<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Tshirt;

class GeneratorPDF extends Controller
{
    public function getTshirtPdf ($id)
    {
        $tshirt = Tshirt::where('id', $id)->first();
        // L'instance PDF avec une vue : resources/views/posts/show.blade.php
        $pdf = PDF::loadView('pdf', ['tshirt' => $tshirt]);
//        return $pdf->download('tshirt_'.$tshirt->model.'_'.$tshirt->size.'_'.$tshirt->id.'.pdf');
        return $pdf->download('custom\'it_'.$tshirt->model.'_'.$tshirt->size.'_'.$tshirt->id.'.pdf');
    }
}
