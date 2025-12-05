<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pond_slots', function (Blueprint $table): void {
            $table->decimal('stage_progress_seconds', 8, 3)->default(0)->change();
            $table->decimal('stage_duration_seconds', 8, 3)->default(0)->change();
        });
    }

    public function down(): void
    {
        Schema::table('pond_slots', function (Blueprint $table): void {
            $table->unsignedInteger('stage_progress_seconds')->default(0)->change();
            $table->unsignedInteger('stage_duration_seconds')->default(0)->change();
        });
    }
};
