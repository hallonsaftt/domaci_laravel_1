<?php

namespace App\Repositories;

use App\Models\ShopModel;

class ProductRepositories
{

        private $productModel;


        public function __construct()
        {
            $this->productModel = new ShopModel();
        }


        public function test()
        {
            dd("12323213");
        }

        public function deleteProduct($product)

        {
           return $this->productModel->where(['id' => $product])->first();
        }

}
