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
        Schema::create('reservation_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
//            $table->integer('reservation_id')->unsigned()->nullable()->cons;
//            $table->integer('user_id')->unsigned()->nullable();

//            $table->unique(array('reservation_id', 'user_id'));

            $table->foreignId('reservation_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation_user');
    }
};
