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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id');
            $table->foreign('team_id')
                    ->references('id')
                    ->on('teams')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->double('cycle')->default(0.0);
            $table->integer('dragon_breath')->default(0);
            $table->integer('restore')->default(0);
            $table->tinyInteger('ultimate')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
