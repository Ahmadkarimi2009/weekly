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
            $table->enum('month', ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'September', 'October', 'November', 'December']);
            $table->year('year');
            $table->smallInteger('indirect_benificiaries');
            $table->unsignedTinyInteger('province');
            $table->unsignedTinyInteger('topic');
            $table->string('weekly_report_file')->nullable();
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
