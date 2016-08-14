<?php

use Illuminate\Database\Seeder;
use App\Product;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product([
          'name' => 'Goose Island',
          'description' => 'Not too much carbonation, the natural flavors come through quite well. Heavy, full bodied, and not watery at all. A very pleasant mouthfeel, smooth and not hard to drink at all.',
          'price' => '2.00',
          'imageurl' => 'http://travisneilson.com/assets/post-assets/025-rootbeer/img/beer-goose-island.png'
        ]);
        $product->save();

        $product = new Product([
          'name' => 'Hanks',
          'description' => 'Overall is very soft, a perfect blend of tingle and flavor. The spices combine well with there carbonation. A very well blended full body.',
          'price' => '2.50',
          'imageurl' => 'http://travisneilson.com/assets/post-assets/025-rootbeer/img/beer-hanks.png'
        ]);
        $product->save();

        $product = new Product([
          'name' => 'Margos Dark',
          'description' => 'The carbonation is a good balance of tingle and excitement, but also steps back to let this great list of flavors come through. The nutmeg and wintergreen are well voiced together in this brew and bring about an uncommon mixture of freshness and sweet warmth.',
          'price' => '3.00',
          'imageurl' => 'http://travisneilson.com/assets/post-assets/025-rootbeer/img/beer-margos.png'
        ]);
        $product->save();

        $product = new Product([
          'name' => 'Red Arrow',
          'description' => 'A very full body with a strong punch of carbonation and wintergreen. The licorice comes through pretty strong through the body making it very dark, I may be just quite thirsty, but this brew is quite refreshing.',
          'price' => '2.00',
          'imageurl' => 'http://travisneilson.com/assets/post-assets/025-rootbeer/img/beer-red-arrow.png'
        ]);
        $product->save();

        $product = new Product([
          'name' => 'Rocket Fizz Float',
          'description' => 'Surprisingly, this is a fairly weak bodied brew  the spices are nice and flavorful, but lacks that special something. Positioned as a "root beer float" I would have liked more creaminess and some vanilla.',
          'price' => '1.80',
          'imageurl' => 'http://travisneilson.com/assets/post-assets/025-rootbeer/img/beer-rocket-fizz.png'
        ]);
        $product->save();

        $product = new Product([
          'name' => 'Abita',
          'description' => 'The body has sharp tastes of root beer spices, but is not sweet or very exciting due to the lack of honey or vanilla which could bring about a bit more creaminess.',
          'price' => '2.80',
          'imageurl' => 'http://travisneilson.com/assets/post-assets/025-rootbeer/img/beer-abita.png'
        ]);
        $product->save();

        $product = new Product([
          'name' => 'Bulldog',
          'description' => 'The body is a wonderful combination of delicate flavors. The honey and vanilla work together to bring about a real sweetness within the root spices. I like cane sugar much better than high fructose corn syrup, it has a different mouth feel, but is mostly evidenced in the lack oh a too-heavy aftertaste.',
          'price' => '2.75',
          'imageurl' => 'http://travisneilson.com/assets/post-assets/025-rootbeer/img/beer-bulldog.png'
        ]);
        $product->save();

        $product = new Product([
          'name' => 'Firemans Brew',
          'description' => 'Not too much carbonation, the natural flavors come through quite well. Heavy, full bodied, and not watery at all. A very pleasant mouthfeel, smooth and not hard to drink.',
          'price' => '4.00',
          'imageurl' => 'http://travisneilson.com/assets/post-assets/025-rootbeer/img/beer-firemans-brew.png'
        ]);
        $product->save();

    }
}
