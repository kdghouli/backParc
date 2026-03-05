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
        Schema::table('tasks', function (Blueprint $table) {
            // Clés étrangères optionnelles pour plus tard
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            // Index pour améliorer les performances
            $table->index('status');
            $table->index('priority');
            $table->index('urgence');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            //
        });
    }
};
