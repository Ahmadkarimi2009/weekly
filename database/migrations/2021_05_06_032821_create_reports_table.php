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
            $table->enum('week', [1, 2, 3, 4]);
            $table->enum('month', ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'September', 'October', 'November', 'December']);
            $table->year('year');
            $table->jsonb('json_data')->nullable();
            $table->string('weekly_report_file');
            $table->unsignedTinyInteger('province');
            $table->unsignedTinyInteger('event_type_id');
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
