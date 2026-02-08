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
        Schema::create('dailychecks', function (Blueprint $table) {
            $table->id();
            $table->date('dateControle')->nullable();
            $table->boolean('frein')->default(false);
            $table->boolean('pneus')->default(false);
            $table->boolean('eclairage')->default(false);
            $table->boolean('extincteur')->default(false);
            $table->boolean('batterie')->default(false);
            $table->boolean('fuite')->default(false);
            $table->boolean('avertisseur')->default(false);
            $table->boolean('ceinture')->default(false);
            $table->boolean('retroviseur')->default(false);
            $table->string('observation')->nullable();
            $table->string('kilometrage')->nullable()->default(0);


            $table->foreignId('vhl_id')->nullable()
            ->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->nullable()
            ->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('utilisateur_id')->nullable()
            ->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dailychecks');
    }
};
