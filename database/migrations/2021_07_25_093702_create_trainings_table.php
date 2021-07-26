<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('participants_list_files')->nullable();
            $table->jsonb('participants_list_ids')->nullable();
            $table->string('location')->nullable();
            $table->text('details')->nullable();
            $table->jsonb('photos')->nullable();
            $table->jsonb('videos')->nullable();
            $table->string('trainers')->nullable();
            $table->jsonb('materials')->nullable();
            $table->jsonb('attendance_files')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainings');
    }
}
