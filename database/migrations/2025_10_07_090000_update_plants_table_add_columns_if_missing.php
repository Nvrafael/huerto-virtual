<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('plants')) {
            Schema::table('plants', function (Blueprint $table) {
                if (!Schema::hasColumn('plants', 'name')) {
                    $table->string('name')->after('id');
                }
                if (!Schema::hasColumn('plants', 'growth_time')) {
                    $table->unsignedInteger('growth_time')->after('name');
                }
                if (!Schema::hasColumn('plants', 'description')) {
                    $table->text('description')->after('growth_time');
                }
                if (!Schema::hasColumn('plants', 'image')) {
                    $table->string('image')->nullable()->after('description');
                }
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('plants')) {
            Schema::table('plants', function (Blueprint $table) {
                if (Schema::hasColumn('plants', 'image')) {
                    $table->dropColumn('image');
                }
                if (Schema::hasColumn('plants', 'description')) {
                    $table->dropColumn('description');
                }
                if (Schema::hasColumn('plants', 'growth_time')) {
                    $table->dropColumn('growth_time');
                }
                if (Schema::hasColumn('plants', 'name')) {
                    $table->dropColumn('name');
                }
            });
        }
    }
};


