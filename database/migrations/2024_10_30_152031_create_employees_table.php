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
            $table->id(); // Bigint , pri, auto . un
            $table->string("name", 200)->unique();
            $table->float("salary");
            $table->bigInteger("department_id")->unsigned();
            $table->foreign("department_id")->references("id")->on('departments')
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->timestamps(); // Created_At , Updated_At
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
