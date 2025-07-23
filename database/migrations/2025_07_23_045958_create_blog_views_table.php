<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('blog_views', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('blog_id');
        $table->unsignedBigInteger('user_id')->nullable();
        $table->string('ip_address')->nullable();
        $table->timestamps();

        $table->unique(['blog_id', 'user_id', 'ip_address']); // Cegah duplikat
        $table->foreign('blog_id')->references('id')->on('blog')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('blog_views');
}

};
