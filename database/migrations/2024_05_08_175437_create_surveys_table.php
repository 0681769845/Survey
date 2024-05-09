<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->date('dob');
            $table->string('contact_number');
            $table->text('favorite_food')->nullable();
            $table->string('movies_rating')->nullable();
            $table->string('radio_rating')->nullable();
            $table->string('eat_out_rating')->nullable();
            $table->string('watch_tv_rating')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
