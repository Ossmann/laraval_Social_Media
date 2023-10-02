<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('inp_id'); // use unsigned not id() because thats only for the Primary Key
            $table->string('email')->unique();
            $table->text('description');
            $table->integer('students_required');
            $table->integer('year');
            $table->integer('trimester');
            $table->string('image');
            // $table->string('pdf');
            $table->timestamps();
            $table->foreign('inp_id')->references('id')->on('partners'); // Enforces foreign key constraint

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
