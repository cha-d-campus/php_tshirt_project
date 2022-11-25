<?php

namespace App\Http\Controllers;

use App\Services\GeneratorPDFService;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Tshirt;

class GeneratorPDF extends Controller
{
    public function getTshirtPdf ($id, GeneratorPDFService $generatorPDFService)
    {
        $tshirt = Tshirt::where('id', $id)->first();
        return $generatorPDFService->download($tshirt);

    }

}
