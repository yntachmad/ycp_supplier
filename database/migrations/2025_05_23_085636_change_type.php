<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('vendors', function (Blueprint $table) {
            // if (Schema::hasColumn('vendors', 'type_company_id') && Schema::getConnection()->getDoctrineSchemaManager()->listTableForeignKeys('vendors')) {
            //     $table->dropForeign(['type_company_id']);
            // }

            $table->dropForeign(['type_company_id']);
            $table->unsignedBigInteger('type_company_id')->nullable()->change();
            $table->string('type_company_id')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->string('type_company_id')->change();
        });
    }
};
