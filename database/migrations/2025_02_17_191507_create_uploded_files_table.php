<?php

use App\Models\Document;
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
        Schema::create('uploded_files', function (Blueprint $table) {
            $table->id();
            $table->text('file_name');
            $table->text('original_name');
            $table->text('file_path');
            $table->timestamps();
            $table->foreignIdFor(Document::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uploded_files');
    }
};
