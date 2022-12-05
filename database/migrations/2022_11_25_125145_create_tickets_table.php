<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('place');
            $table->integer('cost');
            $table->integer('quantity');
            $table->dateTime('when');
            $table->binary('image');
            $table->timestamps();

            $table->softDeletes();
        });
//      В Ларе нет лонгового бинарника, поэтому модифицируем через запрос
        DB::statement("ALTER TABLE tickets MODIFY COLUMN image LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
