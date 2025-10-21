<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // judul post
            $table->text('body');    // isi post
            $table->timestamps();    // created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
