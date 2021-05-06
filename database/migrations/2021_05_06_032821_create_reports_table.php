<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('number_of_male');
            $table->smallInteger('number_of_female');
            $table->enum('week', [1, 2, 3, 4]);
            $table->enum('month', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]);
            $table->year('year');
            $table->smallInteger('indirect_benificiaries');
            $table->unsignedTinyInteger('province');
            $table->unsignedTinyInteger('topic');
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
        Schema::dropIfExists('reports');
    }
}
