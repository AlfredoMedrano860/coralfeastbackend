<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('notification_types', function (Blueprint $table): void {
            $table->string('background_color')
                ->nullable()
                ->comment('Background color for notifications of this type');
            $table->string('text_color')
                ->nullable()
                ->comment('Text color for notifications of this type');
            $table->string('border_color')
                ->nullable()
                ->comment('Border color for notifications of this type');
        });
    }

    public function down(): void
    {
        Schema::table('notification_types', function (Blueprint $table): void {
            $table->dropColumn(['background_color', 'text_color', 'border_color']);
        });
    }
};
