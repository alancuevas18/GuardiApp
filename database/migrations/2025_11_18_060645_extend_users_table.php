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
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable()->after('name');
            $table->string('last_name')->nullable()->after('first_name');
            $table->date('dob')->nullable()->after('email');
            $table->enum('gender', ['male', 'female', 'other'])->nullable()->after('dob');
            $table->string('phone')->nullable()->after('gender');
            $table->text('address')->nullable()->after('phone');
            $table->string('avatar_path')->nullable()->after('address');
            $table->string('status')->default('active')->after('avatar_path');
            $table->foreignId('company_id')->nullable()->constrained()->onDelete('cascade')->after('status');
            $table->foreignId('branch_id')->nullable()->constrained()->onDelete('set null')->after('company_id');
            $table->string('position')->nullable()->after('branch_id');
            $table->date('hire_date')->nullable()->after('position');
            $table->string('shift')->nullable()->after('hire_date');
            $table->string('id_number')->unique()->nullable()->after('shift');
            $table->softDeletes()->after('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropForeign(['branch_id']);
            $table->dropColumn([
                'first_name', 'last_name', 'dob', 'gender', 'phone', 
                'address', 'avatar_path', 'status', 'company_id', 'branch_id',
                'position', 'hire_date', 'shift', 'id_number', 'deleted_at'
            ]);
        });
    }
};
