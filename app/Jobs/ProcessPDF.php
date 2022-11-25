<?php

namespace App\Jobs;

use App\Http\Controllers\GeneratorPDF;
use App\Models\Tshirt;
use App\Providers\TshirtCreated;
use App\Services\GeneratorPDFService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessPDF implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * The podcast instance.
     *
     * @var \App\Models\Tshirt
     */
    protected $tshirt;
    protected $generatorPDFService;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Tshirt $tshirt, GeneratorPDFService $generatorPDFService)
    {
        $this->tshirt = $tshirt;
        $this->generatorPDFService = $generatorPDFService;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->generatorPDFService->save($this->tshirt);
    }
}
