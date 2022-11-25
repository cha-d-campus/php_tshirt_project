<?php

namespace App\Services;

use App\Models\Tshirt;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class GeneratorPDFService
{
        public function download(Tshirt $tshirt){
            $pdf = PDF::loadView('pdf', ['tshirt' => $tshirt]);
            return $pdf->download('custom\'it_'.$tshirt->model.'_'.$tshirt->size.'_'.$tshirt->id.'.pdf');
        }

        public function save(Tshirt $tshirt){
            $pdf = PDF::loadView('pdf', ['tshirt' => $tshirt]);
            $content = $pdf->download()->getOriginalContent();
            Storage::put('img/pdf/custom\'it_'.$tshirt->model.'_'.$tshirt->size.'_'.$tshirt->id.'.pdf',$content);
        }
}
