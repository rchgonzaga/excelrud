<?php

use App\Gateway\ImportGateway;
use App\Import;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Mockery\Mock;

class ImportGatewayTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGatewayImportXlsx()
    {
        $import = factory(App\Import::class)->create([
            'status' => Import::STATUS_QUEUED,
            'extension' => 'xlsx'
        ]);

        $from = public_path() . '/../tests/fixtures/products_teste_webdev_leroy.xlsx';
        $to = public_path() . '/uploads/imports/' . $import->id . '.' . $import->extension;
        File::copy($from, $to);

        $importGateway = App::make(ImportGateway::class);
        $importGateway->processImport($import);

        $this->assertEquals($import->products->first()->category, 'Ferramentas');
        $this->assertEquals($import->products->count(), 6);
        $this->assertEquals($import->status, Import::STATUS_DONE);
    }
}
