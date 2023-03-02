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
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            
            $table->string('artist_nickname', 30)->unique();
            $table->text('introduction_text', 1000);
            $table->string('address', 200);
            $table->string('phone_number', 20);
            $table->string('profile_photo')->nullable();
            $table->string('seeded_pic', 1000)->nullable();
            $table->string('slug');


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
        Schema::dropIfExists('artists');
    }
};
