<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Division;
use App\Models\Treasury;
use App\Models\Box;
use App\Models\Document; 

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('document_title');
            $table->date('date_archived');
            $table->string('document_type');
            $table->string('document_code');
            $table->string('full_number');  
            $table->foreignIdFor(Division::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Treasury::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Box::class)->constrained()->cascadeOnDelete(); 
            $table->timestamps();
        });

        Schema::create('user_document_actions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Division::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Document::class)->constrained()->cascadeOnDelete();
            $table->date('return_date');
            $table->date('delivery_date');
            $table->string('operation_topic');
            $table->enum('operation_type', ['download', 'print']);
            $table->timestamps();
        });        
    }      

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_document_actions');
        Schema::dropIfExists('documents');
    }
};
