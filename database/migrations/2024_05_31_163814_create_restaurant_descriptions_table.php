<?php

use App\Models\User;
use App\Models\Ward;
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
        Schema::create('restaurant_descriptions', function (Blueprint $table) {
            $table->id();
            $table->string('restaurant_name');
            $table->foreignIdFor(User::class)->unique();
            $table->string('address');
            $table->string('phone_number');
            $table->time('opening_time')->format('H:i');
            $table->time('closing_time')->format('H:i');
            $table->float('longitude')->nullable();
            $table->float('latitude')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_descriptions');
    }
};
