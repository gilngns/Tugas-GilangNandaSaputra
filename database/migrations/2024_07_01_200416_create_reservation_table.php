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
        Schema::create('reservation', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('service_id');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->enum('status', ['process', 'finish', 'cancel'])->default('process');
            $table->timestamps();

            $table->foreign('branch_id')->references('id')->on('branch')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('service_id')->references('id')->on('services')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation');
    }
};
