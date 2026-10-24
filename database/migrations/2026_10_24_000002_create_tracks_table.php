<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('file_path');
            $table->string('genre')->nullable();
            $table->string('city')->nullable();
            $table->boolean('airplay_permission')->default(false);
            $table->timestamp('permission_granted_at')->nullable();
            $table->string('status')->default('draft');
            $table->timestamps();
            $table->index(['status', 'airplay_permission']);
            $table->index('city');
            $table->index('genre');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tracks');
    }
};
