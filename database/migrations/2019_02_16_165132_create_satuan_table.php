<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSatuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satuan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('satuan');
            $table->timestamps();
        });

        \DB::table('satuan')
            ->insert([
                'satuan' => 'KG',
            ]);

        \DB::table('satuan')
            ->insert([
                'satuan' => 'Buah',
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('satuan');
    }
}
