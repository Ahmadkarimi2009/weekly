<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('province')->nullable();
            $table->string('district')->nullable();
            $table->date('date_of_employment')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->string('position');
            $table->text('job_description')->nullable();
            $table->string('ipso_id');
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
        Schema::dropIfExists('staff');
    }
}
