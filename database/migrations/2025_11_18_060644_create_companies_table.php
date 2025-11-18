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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name_legal');
            $table->string('trade_name');
            $table->string('company_type')->nullable();
            $table->string('rnc')->unique()->nullable();
            $table->string('phone_primary')->nullable();
            $table->string('phone_office')->nullable();
            $table->string('phone_emergency')->nullable();
            $table->text('address')->nullable();
            $table->string('email')->nullable();
            $table->string('logo_path')->nullable();
            $table->string('timezone')->default('America/Santo_Domingo');
            $table->string('locale')->default('es');
            $table->string('currency')->default('DOP');
            $table->json('billing_info')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
