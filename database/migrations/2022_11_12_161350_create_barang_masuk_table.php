<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('no_barang_masuk');
            $table->foreignId('barang_id');
            $table->foreignId('supplier_id');
            $table->timestamp('tgl_barang_masuk');
            $table->string('harga');
            $table->integer('jml_barang_masuk');
            $table->bigInteger('total');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barang_masuk', function (Blueprint $table) {
            $table->dropSoftDeletes(); 
        });
    }
};
