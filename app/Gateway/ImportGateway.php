<?php

namespace App\Gateway;

use App\Import;
use App\Product;
use App\Repository\ProductRepository;
use Maatwebsite\Excel\Collections\RowCollection;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Readers\LaravelExcelReader;

class ImportGateway extends Gateway
{
    /**
     * @var Excel
     */
    protected $excel;

    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * ImportGateway constructor.
     * @param Excel $excel
     */
    public function __construct(Excel $excel, ProductRepository $productRepository)
    {
        $this->excel = $excel;
        $this->productRepository = $productRepository;
    }

    /**
     * @param Import $import
     */
    public function processImport(Import $import)
    {
        if ($import->status != Import::STATUS_QUEUED) return false;

        // Set status to processing
        $import->status = Import::STATUS_PROCESSING;
        $import->save();

        $path = public_path() . '/uploads/imports/' . $import->id . '.' . $import->extension;

        if (in_array($import->extension, ['xls', 'xlsx'])) {
            $this->excel->load($path, function (LaravelExcelReader $reader) use ($import) {
                $reader->noHeading();
                $reader->ignoreEmpty();

                /**
                 * @var RowCollection
                 */
                $rows = $reader->get()->first()->all();
                $category = $rows[1][1];
                for ($i = 4; $i < count($rows); $i++) {
                    $row = $rows[$i]->all();

                    $lm = $row[0];

                    $product = $this->productRepository->findByUserLm($import->user_id, $lm);
                    if (!$product) {
                        $product = new Product();
                        $product->user_id = $import->user_id;
                    }

                    $product->import_id = $import->id;
                    $product->lm = $lm;
                    $product->name = $row[1];
                    $product->free_shipping = $row[2];
                    $product->description = $row[3];
                    $product->price = $row[4];
                    $product->category = $category;
                    $product->save();
                }
            });

            $import->status = Import::STATUS_DONE;
            $import->save();
        }

        return true;
    }
}
