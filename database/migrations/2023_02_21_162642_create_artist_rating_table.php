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
        Schema::create('artist_rating', function (Blueprint $table) {
            $table->id();

            $table->foreignId('artist_id')->constrained()->onDelete('cascade');
            $table->foreignId('rating_id')->constrained()->onDelete('cascade');

            $table->date('rating_date');

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
        Schema::dropIfExists('artist_rating');
    }
};
