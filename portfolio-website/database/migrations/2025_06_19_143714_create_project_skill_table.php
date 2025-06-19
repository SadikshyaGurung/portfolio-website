<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        if (!Schema::hasTable('project_skill')) {
            Schema::create('project_skill', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('project_id');
                $table->unsignedBigInteger('skill_id');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('project_skill');
    }
};
