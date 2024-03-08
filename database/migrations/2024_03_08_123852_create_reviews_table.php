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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignUuId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignUuId('recipe_id')->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('raiting');
            $table->text('comment');
            $table->timestamps('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->timestamps('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
