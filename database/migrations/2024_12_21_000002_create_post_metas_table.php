<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        $tablePrefix = config('blog.table_prefix', 'blogy_');
        
        Schema::create($tablePrefix . 'post_metas', function (Blueprint $table) use ($tablePrefix) {
            $table->id();
            $table->foreignId('post_id')->constrained($tablePrefix . 'posts')->onDelete('cascade');
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        $tablePrefix = config('blog.table_prefix', 'blogy_');
        Schema::dropIfExists($tablePrefix . 'post_metas');
    }
};
