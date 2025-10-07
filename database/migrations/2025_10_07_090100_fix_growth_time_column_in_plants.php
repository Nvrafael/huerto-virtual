<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('plants')) {
            return;
        }

        $hasDays = Schema::hasColumn('plants', 'growth_time_days');
        $hasGrowth = Schema::hasColumn('plants', 'growth_time');

        // Asegurar columna growth_time existe
        if (!$hasGrowth) {
            Schema::table('plants', function (Blueprint $table) {
                $table->unsignedInteger('growth_time')->default(0)->after('name');
            });
            $hasGrowth = true;
        }

        // Si existe la columna legacy, migrar datos y eliminarla
        if ($hasDays) {
            // Copiar valores si growth_time tiene NULL o 0 y legacy tiene dato
            DB::statement('UPDATE plants SET growth_time = COALESCE(NULLIF(growth_time, 0), growth_time_days)');

            Schema::table('plants', function (Blueprint $table) {
                $table->dropColumn('growth_time_days');
            });
        }
    }

    public function down(): void
    {
        if (!Schema::hasTable('plants')) {
            return;
        }

        // Re-crear columna legacy opcionalmente, sin romper datos actuales
        if (!Schema::hasColumn('plants', 'growth_time_days')) {
            Schema::table('plants', function (Blueprint $table) {
                $table->unsignedInteger('growth_time_days')->nullable()->after('growth_time');
            });
            // No revertimos los datos para evitar pérdida; mantenemos growth_time como fuente de verdad
        }
    }
};


