<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExtraWorksTimeSheets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_works__time_sheets', function (Blueprint $table) {
            $table->bigInteger('extra_work_id')->unsigned();
            $table->bigInteger('time_sheet_id')->unsigned();
            $table->integer('pay_per_item');
            $table->foreign('extra_work_id')
                        ->on('extra_works')
                        ->references('id')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('time_sheet_id')
                        ->on('time_sheets')
                        ->references('id')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->primary(['extra_work_id', 'time_sheet_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('extra_works__time_sheets');
    }
}
