<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleCategoryTable extends Migration
{
    public function up()
    {
        Schema::create('article_category', function (Blueprint $table) {
            $table->foreignId('article_id')->constrained('articles')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->primary(['article_id', 'category_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('article_category');
    }
}

