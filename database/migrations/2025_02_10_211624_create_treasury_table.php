<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Treasury;
use App\Models\Shelf;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('treasuries', function (Blueprint $table) {
            $table->id();
            $table->string('treasury_name');
            $table->integer('treasury_number');
            $table->string('treasury_location', 255);
            $table->timestamps();
        });

        Schema::create('shelves', function (Blueprint $table) {
            $table->id();
            $table->string('shelf_name');
            $table->integer('shelf_number');
            $table->string('shelf_location', 255); 
            $table->foreignIdFor(Treasury::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('boxes', function (Blueprint $table) {
            $table->id();
            $table->string('box_name');
            $table->integer('box_number'); 
            $table->foreignIdFor(Shelf::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boxes');
        Schema::dropIfExists('shelves');
        Schema::dropIfExists('treasuries');
    }
};
