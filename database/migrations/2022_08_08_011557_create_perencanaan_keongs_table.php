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
        Schema::create('perencanaan_keong', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('opd_id');
            $table->string('sub_indikator');
            $table->integer('status'); // 0/1/2
            $table->text('alasan_ditolak')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perencanaan_keong');
    }
};
