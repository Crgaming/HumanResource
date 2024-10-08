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
        Schema::create('employees', function (Blueprint $table) {
            $table->integer('BusinessEntityID'); // Primary key
            $table->string('NationalIDNumber', 25); 
            $table->string('LoginID', 255);
            $table->longText('OrganizationNode');
            $table->smallInteger('OrganizationLevel');
            $table->string('JobTitle', 50);
            $table->date('BirthDate');
            $table->char('MaritalStatus', 1); 
            $table->char('Gender', 1); 
            $table->date('HireDate');
            $table->smallInteger('VacationHours');
            $table->smallInteger('SickLeaveHours');
            $table -> dateTime('ModifiedDate');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
