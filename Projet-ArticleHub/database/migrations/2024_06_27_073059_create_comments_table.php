<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            $table->text('contenu');
            $table->dateTime('date_publication');
            $table->foreignId('utilisateur_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('article_id')->constrained('articles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('commentaires');
    }
}

