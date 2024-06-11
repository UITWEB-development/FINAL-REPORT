<?php

use App\Models\Category;
use App\Models\User;
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
        Schema::create('products', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->integer('price');
            $table->string('name');
            $table->longText('description');
            $table->string('image_path');
            $table->boolean('is_available');
            $table->timestamps();
            $table->softDeletes();

            // $table->tinyInteger('category_id', false, true);
            // $table->ulid('user_id');
            // $table->foreign('category_id')->references('id')->on('categories');
            // $table->foreign('user_id')->references('id')->on('users'); 
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Category::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
