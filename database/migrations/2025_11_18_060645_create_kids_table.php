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
        Schema::create('kids', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob');
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('photo_path')->nullable();
            $table->text('address')->nullable();
            $table->json('emergency_contacts')->nullable();
            $table->json('medical_info')->nullable();
            $table->text('allergies')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('branch_id')->constrained()->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kids');
    }
};
