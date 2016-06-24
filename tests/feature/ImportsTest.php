<?php

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ImportsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var User
     */
    protected $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory(App\User::class)->create();
        $this->actingAs($this->user);
    }

    public function testImportIndexEmpty()
    {
        $this->visit('import')
            ->see("You still don't have any imports");
    }

    public function testImportIndex()
    {
        for ($i = 0; $i < rand(1, 10); $i++) {
            factory(App\Import::class)->create([
                'user_id' => $this->user->id
            ]);
        }

        $this->visit('import');
        $imports = $this->user->imports();
        foreach ($imports as $import) {
            $this->see($import->name);
        }
    }

    public function testImportShow()
    {
        $import = factory(App\Import::class)->create([
            'user_id' => $this->user->id
        ]);

        for ($i = 0; $i < rand(1, 10); $i++) {
            factory(App\Product::class)->create([
                'user_id' => $import->user_id,
                'import_id' => $import->id
            ]);
        }

        $this->visit('import/' . $import->id)
            ->see($import->name);

        $products = $this->user->products();
        foreach ($products as $product) {
            $this->see($product->name);
        }
    }

    public function testImportXlsx()
    {
        $filePath = public_path() . '/../tests/fixtures/products_teste_webdev_leroy.xlsx';

        $this->expectsJobs(App\Jobs\ProcessImport::class);

        $this->visit('import/create')
            ->attach($filePath, 'file')
            ->press('Import')
            ->seePageIs('import');
    }
}
