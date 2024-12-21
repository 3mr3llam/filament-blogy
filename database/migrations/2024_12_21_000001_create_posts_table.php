<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        $tablePrefix = config('blog.table_prefix', 'blogy_');
        
        Schema::create($tablePrefix . 'posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('content');
            $table->string('featured_image')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        $tablePrefix = config('blog.table_prefix', 'blogy_');
        Schema::dropIfExists($tablePrefix . 'posts');
    }
};
