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
        Schema::create('contraint', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('hari_id')->nullable();
            $table->uuid('jam_id')->nullable();
            $table->uuid('dosen_id')->nullable();
            $table->softDeletes();

            $table->foreign('dosen_id')
                ->references('id')
                ->on('dosens')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('hari_id')
                ->references('id')
                ->on('hari')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('jam_id')
                ->references('id')
                ->on('jam')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contraint');
    }
};
