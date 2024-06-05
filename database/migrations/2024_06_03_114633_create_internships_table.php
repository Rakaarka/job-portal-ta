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
        Schema::create('internships', function (Blueprint $table) {
            $table->uuid('id_internship')->primary();
            $table->string('title');
            $table->longText('banner');
            $table->date('start_date');
            $table->date('end_date');
            $table->date('start_register_date');
            $table->date('end_register_date');
            $table->longText('desc');
            $table->longText('contact');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internships');
    }
};
