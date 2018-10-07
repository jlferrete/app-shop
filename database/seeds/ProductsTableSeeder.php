<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;
use App\ProductImage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //model factory otra forma de poblar los datos
        /*factory(Category::class, 5)->create();
        factory(Product::class, 100)->create();
        factory(ProductImage::class, 200)->create();*/

        $categories = factory(Category::class, 5)->create();
        $categories->each(function($category){
            $products = factory(Product::class, 20)->make();
            $category->products()->saveMany($products);

            $products->each(function ($p){
                $images = factory(ProductImage::class, 5)->make();
                $p->images()->saveMany($images);
            });
        });

        /* $users = factory(App\User:class, 3)
        ->create()
        ->each(function ($u) {
            $u->posts()->save(factory(App\Post::class)->make());
        }); */
    }
}
