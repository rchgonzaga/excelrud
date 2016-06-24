<?php

namespace App\Repository;

use App\Product;

class ProductRepository extends Repository
{
    public function findByUserLm($user_id, $lm) {
        return Product::where('lm', '=', $lm)->where('user_id', '=', $user_id)->first();
    }
}
