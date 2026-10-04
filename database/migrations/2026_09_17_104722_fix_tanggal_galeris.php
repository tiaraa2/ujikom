<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('galeris', 'tanggal')) {
            Schema::table('galeris', function (Blueprint $table) {
                $table->date('tanggal')->nullable();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('galeris', 'tanggal')) {
            Schema::table('galeris', function (Blueprint $table) {
                $table->dropColumn('tanggal');
            });
        }
    }
};