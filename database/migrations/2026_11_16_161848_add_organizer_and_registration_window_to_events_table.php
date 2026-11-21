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
        Schema::table('events', function (Blueprint $table) {
            $table->foreignId('organizer_id')->constrained('users')->restrictOnDelete();

            $table->dateTime('registration_start_at');
            $table->dateTime('registration_end_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['organizer_id']);

            $table->dropColumn([
                'organizer_id',
                'registration_start_at',
                'registration_end_at',
            ]);
        });
    }
};
