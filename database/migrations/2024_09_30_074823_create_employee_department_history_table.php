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
        Schema::create('employee_department_history', function (Blueprint $table) {
            $table->unsignedBigInteger('BusinessEntityID');
            $table->unsignedSmallInteger('DepartmentID');
            $table->unsignedTinyInteger('ShiftID');
            $table->date('StartDate');
            $table->date('EndDate')->nullable();  // Allow null for ongoing employment

            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('BusinessEntityID')
                ->references('BusinessEntityID')
                ->on('employees')
                ->onDelete('cascade');

            $table->foreign('DepartmentID')
                ->references('DepartmentID')
                ->on('departments')
                ->onDelete('cascade');

            $table->foreign('ShiftID')
                ->references('ShiftID')
                ->on('shifts')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_department_history');
    }
};
