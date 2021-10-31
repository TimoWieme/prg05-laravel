<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SerieUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
        {
            Schema::create('serie_user', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('serie_id');
                // On delete, remove relations aswell. Otherwise cant delete serie in dashboard if its favorited.
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
                $table->foreign('serie_id')->references('id')->on('series')->onDelete('cascade');;
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
                Schema::dropIfExists('serie_user');
            }
}
