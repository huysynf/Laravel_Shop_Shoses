<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductSizeColor;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $faker=new Faker();
        for($i=0;$i<50;$i++)
        {

            $name='Giày nike '.$i;
            $slug=\Illuminate\Support\Str::slug($name);
         $product= Product::create([
             'name'=>$name,
             'sale'=>0,
             'product_key'=>'MSPRO'.$i,
             'image'=>'default.jpg',
             'description'=>'san pham',
             'status'=>1,
             'slug'=>$slug,
             'brand_id'=>1,
            ]);
            $product->categories()->attach([1,2]);
            $size=  ProductSize::create([
                'product_id'=>$product->id,
                'price'=>100000+$i,
                'size'=>30,
            ]);
            $size2=  ProductSize::create([
                'product_id'=>$product->id,
                'price'=>100000+$i,
                'size'=>31,
            ]);
            $size3=  ProductSize::create([
                'product_id'=>$product->id,
                'price'=>100000+$i,
                'size'=>32,
            ]);

          ProductSizeColor::create(
              [
                  'product_size_id'=>$size->id,
                  'color'=>'Black',
                  'quantity'=>10,
              ]);
            ProductSizeColor::create(
              [
                  'product_size_id'=>$size->id,
                  'color'=>'Red',
                  'quantity'=>10,
              ]);  ProductSizeColor::create(
              [
                  'product_size_id'=>$size2->id,
                  'color'=>'Black',
                  'quantity'=>10,
              ]);  ProductSizeColor::create(
              [
                  'product_size_id'=>$size2->id,
                  'color'=>'Red',
                  'quantity'=>10,
              ]);  ProductSizeColor::create(
              [
                  'product_size_id'=>$size3->id,
                  'color'=>'Black',
                  'quantity'=>10,
              ]);  ProductSizeColor::create(
              [
                  'product_size_id'=>$size3->id,
                  'color'=>'Red',
                  'quantity'=>10,
              ]
          );

        }
    }
}
