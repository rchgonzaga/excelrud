<?php

namespace App\Jobs;

use App\Gateway\ImportGateway;
use App\Import;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessImport extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $import;

    /**
     * Create a new job instance.
     *
     * @param Import $import
     */
    public function __construct(Import $import)
    {
        $this->import = $import;
    }

    /**
     * Execute the job.
     *
     * @param ImportGateway $importGateway
     */
    public function handle(ImportGateway $importGateway)
    {
        $importGateway->processImport($this->import);
    }
}
