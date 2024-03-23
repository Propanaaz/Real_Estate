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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text("name");
            $table->text("location");
            $table->text("description");
            $table->text("price");
            $table->text("slug");
            $table->string("image1");
            $table->string("image2");
            $table->string("image3");
            $table->string("image4");
            $table->text("feature1");
            $table->text("feature2");
            $table->text("feature3");
            $table->text("feature1ans");
            $table->text("feature2ans");
            $table->text("feature3ans");
            $table->foreignId("user_id")->constrained()->onDelete('cascade');
            $table->foreignId("propertytype_id")->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
