<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraWorkSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('extra_works__time_sheets');
        Schema::create('extra_work_sheets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('extrawork_id')->unsigned();
            $table->integer('pay_per_item')->default(0);
            $table->integer('num')->default(1);
            $table->foreign('extrawork_id')
                    ->on('extra_works')
                    ->references('id')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
        Schema::dropIfExists('extra_work_sheets');
    }
}
