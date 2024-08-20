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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string("book_title",125);
            $table->date("publish_date");
            $table->foreignId("book_type_id")->constrained("book_types",'id')
            ->restrictOnUpdate()
            ->restrictOnDelete()->nullable();
            $table->unsignedInteger("number_of_pages")->nullable();
            $table->unsignedInteger("number_of_copies")->nullable();
            $table->string("edition",100);
            $table->string("publisher",100);
            $table->string("book_source",100)->nullable();
            $table->string("remarks",125)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
