<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Rename id to skill_id
        Schema::table('skills', function (Blueprint $table) {
            $table->renameColumn('id', 'skill_id');
        });

        // Drop the 'skills' column if exists — outside callback
        if (Schema::hasColumn('skills', 'skills')) {
            Schema::table('skills', function (Blueprint $table) {
                $table->dropColumn('skills');
            });
        }

        // Add title and description only if they don't exist — outside callback
        if (!Schema::hasColumn('skills', 'title')) {
            Schema::table('skills', function (Blueprint $table) {
                $table->string('title')->nullable();
            });
        }

        if (!Schema::hasColumn('skills', 'description')) {
            Schema::table('skills', function (Blueprint $table) {
                $table->text('description')->nullable();
            });
        }
    }

    public function down()
    {
        // Revert skill_id to id
        Schema::table('skills', function (Blueprint $table) {
            $table->renameColumn('skill_id', 'id');
        });

        // Re-add skills column
        if (!Schema::hasColumn('skills', 'skills')) {
            Schema::table('skills', function (Blueprint $table) {
                $table->string('skills')->nullable();
            });
        }

        // Drop title and description columns
        if (Schema::hasColumn('skills', 'title')) {
            Schema::table('skills', function (Blueprint $table) {
                $table->dropColumn('title');
            });
        }

        if (Schema::hasColumn('skills', 'description')) {
            Schema::table('skills', function (Blueprint $table) {
                $table->dropColumn('description');
            });
        }
    }
};
