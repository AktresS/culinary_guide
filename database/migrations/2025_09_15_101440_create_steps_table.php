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
        Schema::create('steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dish_id')->constrained()->onDelete('cascade');
            $table->integer('step_number');
            $table->text('description');
            $table->integer('timer_duration')->nullable(); //Длительность таймера для этого шага в секундах

            $table->foreignId('image_id')->nullable()->constrained()->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('steps');
    }
};
