<?php

use App\Import;
use Illuminate\Database\Seeder;

class ImportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'id' => 1,
                'user_id' => 1,
                'filename' => 'Test_Import_XLSX',
                'extension' => 'xlsx',
                'size' => 2000,
                'status' => Import::STATUS_DONE
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'filename' => 'Test_Import_XLS',
                'extension' => 'xls',
                'size' => 4000,
                'status' => Import::STATUS_DONE
            ],
            [
                'id' => 3,
                'user_id' => 1,
                'filename' => 'Test_Import_CSV',
                'extension' => 'csv',
                'size' => 1000,
                'status' => Import::STATUS_DONE
            ]
        );

        foreach ($data as $it) {
            Import::create($it);
        }
    }
}
