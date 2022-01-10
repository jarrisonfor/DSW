<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\Lot;
use App\Models\Product;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);
        Client::factory(15)->create()->each(function ($client) use ($user) {
            $products = Product::factory(3)->create();
            foreach ($products as $product) {
                Lot::factory(3)->create(['product_id' => $product->id]);
                $faker = Factory::create();
                $client->products()->attach($product->id, [
                    'price' => $faker->randomFloat(2, 1, 100),
                ]);
            }

            Invoice::factory(5)->create(['client_id' => $client->id, 'user_id' => $user->id])->each(function ($invoice) use ($products) {
                foreach ($products as $product) {
                    $faker = Factory::create();
                    $invoice->products()->attach([$product->id => [
                        'invoiceQuantity' => rand(1, 10),
                        'productName' => $faker->word,
                        'lotName' => $faker->word,
                        'lotExpirationDate' => $faker->dateTime,
                        'productPrice' => $faker->randomFloat(2, 1, 100),
                        'productSubtotal' => $faker->randomFloat(2, 1, 100),
                        'tax' => $faker->randomFloat(2, 1, 100),
                        'productTotal' => $faker->randomFloat(2, 1, 100),
                    ]]);
                }
            });
        });
    }

}
