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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->nullable()->constrained('groups')->onDelete('set null');
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');
            $table->foreignId('classification_id')->nullable()->constrained('classifications')->onDelete('set null');
            $table->foreignId('subClassification_id')->nullable()->constrained('sub_classifications')->onDelete('set null');
            $table->text('description');
            $table->foreignId('type_company_id')->nullable()->constrained('company_types')->onDelete('set null');
            $table->string('supplier_name')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('website')->nullable();
            $table->text('address')->nullable();
            $table->foreignId('province_id')->nullable()->constrained('provinces')->onDelete('set null');
            $table->foreignId('city_id')->nullable()->constrained('cities')->onDelete('set null');
            $table->string('legal_document')->nullable();
            // $table->enum('tax_register', ['no', 'yes'])->nullable();
            // $table->enum('Terms_condition', ['no', 'yes'])->nullable();
            $table->integer('tax_register')->nullable();
            $table->integer('Terms_condition')->nullable();
            $table->foreignId('type_bank_id')->nullable()->constrained('banks')->onDelete('set null');
            $table->softDeletes();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
