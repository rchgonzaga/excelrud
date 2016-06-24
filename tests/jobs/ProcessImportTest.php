<?php

use App\Gateway\ImportGateway;
use App\Import;
use App\Jobs\ProcessImport;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProcessImportTest extends TestCase
{
    use DatabaseMigrations;

    public function testMockProcessImportJob()
    {
        $processImport = new ProcessImport(factory(Import::class)->create());

        $mockImportGateway = Mockery::mock(ImportGateway::class);
        $this->app->instance(ImportGateway::class, $mockImportGateway);
        $mockImportGateway->shouldReceive('processImport')->once();

        $importGateway = App::make(ImportGateway::class);
        $processImport->handle($importGateway);
    }
}
