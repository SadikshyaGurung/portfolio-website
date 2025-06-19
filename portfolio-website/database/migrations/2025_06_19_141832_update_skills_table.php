<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSkillsTable extends Migration
{
    public function up()
    {
        Schema::table('skills', function (Blueprint $table) {
            // Remove this line as you’re not renaming 'id'
            // $table->renameColumn('id', 'skill_id');

            if (Schema::hasColumn('skills', 'skills')) {
                $table->dropColumn('skills');
            }

            if (!Schema::hasColumn('skills', 'title')) {
                $table->string('title');
            }

            if (!Schema::hasColumn('skills', 'description')) {
                $table->text('description');
            }
        });
    }

    public function down()
    {
        Schema::table('skills', function (Blueprint $table) {
            $table->string('skills')->nullable();
            $table->dropColumn('title');
            $table->dropColumn('description');
        });
    }
}
