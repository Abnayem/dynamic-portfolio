<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMySkillsTable extends Migration
{
    
    public function up()
    {
        Schema::create('my_skills', function (Blueprint $table) {
            $table->id();
            $table->string('codingskills');
            $table->string('professionalskills');
            $table->integer('percentice');
            $table->string('skillname');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('my_skills');
    }
}
