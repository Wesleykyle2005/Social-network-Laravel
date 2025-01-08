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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->longText(column: 'body')->nullable();
            $table->foreignId(column: 'user_id')->constrained(table:'user')->onDelete('cascade');
            $table->foreignId(column: 'delete_by')->constrained(table:'user')->onDelete('cascade')->nullable();
            $table->timestamp(column: 'deleted_at')->nullable(); // Soft delete
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
