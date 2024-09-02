<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;
use Faker\Generator as Faker;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 20; $i++) {
            $newTransaction = new Transaction();
            $newTransaction->user_id = 1;
            $newTransaction->amount = $faker->randomFloat(2, 0, 1000);
            $newTransaction->date = $faker->dateTimeThisYear();
            $newTransaction->type = $faker->boolean();
            $newTransaction->category_id = $faker->numberBetween(1,7);
            $newTransaction->notes = $faker->sentence();
            $newTransaction->save();
        };
    }
}
