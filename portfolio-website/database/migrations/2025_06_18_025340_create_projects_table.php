<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
       Schema::create('projects', function (Blueprint $table) {
    $table->id(); // this is the primary key (auto-incrementing)
    $table->string('project_id')->nullable(); // make it nullable if you want to keep it but optional
    $table->string('title');
    $table->text('description');
    $table->timestamps();
});


    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
