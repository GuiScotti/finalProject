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
        Schema::create('contact', function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('funnel_id');
            $table->foreign('funnel_id')->references('id')->on('funnel');
            $table->enum('stage', ['no stage', 'prospecting', 'contact', 'proposal']);
            $table->string('email')->unique();
            $table->string('phoneNumber')->unique();
            $table->date('dateOfBirth');
            $table->string('address');
            $table->double('buyValue');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact');
    }
};
