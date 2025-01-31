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
        Schema::create('power_up', function (Blueprint $table) {
//            $table->id();
            $table->foreignId('session_id');
            $table->foreign('session_id')
                ->references('id')
                ->on('game_besar_sessions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('player_id');
            $table->foreign('player_id')
                ->references('id')
                ->on('players')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('power_up');
    }
};
