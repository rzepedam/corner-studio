<?php

use Illuminate\Database\Seeder;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->truncate();

        \CornerStudio\Http\Entities\Payment::create([
            'name' => 'Cheque al día'
        ]);

        \CornerStudio\Http\Entities\Payment::create([
            'name' => 'Cheque a fecha'
        ]);

        \CornerStudio\Http\Entities\Payment::create([
            'name' => 'Débito'
        ]);

        \CornerStudio\Http\Entities\Payment::create([
            'name' => 'Efectivo'
        ]);

        \CornerStudio\Http\Entities\Payment::create([
            'name' => 'Transferencia bancaria'
        ]);

        \CornerStudio\Http\Entities\Payment::create([
            'name' => 'Tarjeta de crédito'
        ]);
    }
}
