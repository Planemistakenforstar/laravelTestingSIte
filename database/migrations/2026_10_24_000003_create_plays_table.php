<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
     {
        Schema::create('plays', function (Blueprint $table) {
            $table->id();
            $table->foreignId('track_id')->constrained()->cascadeOnDelete();
            $table->foreignId('media_player_id')->constrained('users')->cascadeOnDelete();
            $table->dateTime('played_at');
            $table->string('show_name')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index(['track_id', 'played_at']);
            $table->index(['media_player_id', 'played_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tracks');
    }
};
