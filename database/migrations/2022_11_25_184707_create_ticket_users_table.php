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
        Schema::create('ticket_users', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('ticket_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('count');

            $table->index('ticket_id', 'ticket_user_ticket_idx');
            $table->index('user_id', 'ticket_user_user_idx');

            $table->foreign('ticket_id', 'ticket_user_ticket_fk')->on('tickets')->references('id');
            $table->foreign('user_id', 'ticket_user_user_fk')->on('users')->references('id');;


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
        Schema::dropIfExists('ticket_users');
    }
};
