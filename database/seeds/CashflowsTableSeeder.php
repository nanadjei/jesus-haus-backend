<?php

use App\Models\Cashflow;
use Illuminate\Database\Seeder;

class CashflowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cashflow::class, 150)->create();
    }
}
