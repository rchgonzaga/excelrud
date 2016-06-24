<?php

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProductsTest extends TestCase
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

    public function testProductIndexEmpty()
    {
        $this->visit('product')
            ->see('No product has been imported yet');
    }

    public function testProductIndex()
    {
        for ($i = 0; $i < rand(1, 10); $i++) {
            factory(App\Product::class)->create([
                'user_id' => $this->user->id
            ]);
        }

        $this->visit('product');
        $products = $this->user->products();
        foreach ($products as $product) {
            $this->see($product->name)
                ->see($product->lm);
        }
    }

    public function testProductEdit()
    {
        $product = factory(App\Product::class)->create([
            'user_id' => $this->user->id
        ]);

        $newName = $product->name . '_name';
        $this->visit('product/' . $product->id . '/edit')
            ->type($newName, 'name')
            ->press('Update')
            ->seePageIs('product');

        $product = $product->fresh();
        $this->assertEquals($product->name, $newName);
    }

    public function testProductDestroy()
    {
        $product = factory(App\Product::class)->create([
            'user_id' => $this->user->id
        ]);

        $this->visit('product/' . $product->id . '/edit')
            ->press('Delete')
            ->seePageIs('product');

        $this->assertNull($product->fresh());
    }
}
