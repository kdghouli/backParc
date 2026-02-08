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
        Schema::table('vhls', function (Blueprint $table) {
           $table->foreignId('agence_id')
            ->constrained()->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreignId('categorie_id')->nullable()
            ->constrained()->cascadeOnDelete()->cascadeOnUpdate();



            $table->foreignId('service_id')->nullable()
            ->constrained()->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreignId('utilisateur_id')->nullable()
            ->constrained()->cascadeOnDelete()->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vhls', function (Blueprint $table) {
            //
        });
    }
};
