<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hist_statuts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vhl_id')->constrained('vhls')->onDelete('cascade');
            $table->foreignId('ancien_statut_id')->nullable()->constrained('statuts');
            $table->foreignId('nouveau_statut_id')->constrained('statuts');
            $table->foreignId('user_id')->constrained('users');
            $table->text('commentaire')->nullable();

            $table->index('vhl_id');
            $table->index('created_at');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hist_statuts');
    }
};
