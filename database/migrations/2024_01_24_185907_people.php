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
        // Creating "people" table in database
        Schema::create("people", function (Blueprint $table) {
            // main id, with 64bit uing
            $table->bigIncrements("id");

            // first name, 16 char long varchar
            $table->string("first_name", 16);

            // last name, 16 char long varchar
            $table->string("last_name", 16);

            // phone number, 16 char long varchar
            $table->string("phone_number", 16);

            // street name, 32 char long varchar
            $table->string("street", 32);

            // city name, 32 char long varchar
            $table->string("city", 32);

            // three letter country code, 3 char long varchar
            $table->string("country", 3);

            // created_at and updated_at columns, both with datetime types
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
