<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_works', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->integer('pay_per_item')->default(0);
            $table->bigInteger('project_id')->unsigned();
            $table->foreign('project_id')
                        ->on('projects')
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
        Schema::dropIfExists('extra_works');
    }
}
