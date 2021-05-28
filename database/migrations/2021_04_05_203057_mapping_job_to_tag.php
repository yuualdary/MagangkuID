<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MappingJobToTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_to_tags', function (Blueprint $table) {
            //
            $table->uuid('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            $table->uuid('job_id');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_to_tags', function (Blueprint $table) {
            //
            $table->dropForeign(['job_id']);
            $table->dropColoumn(['job_id']);
            $table->dropForeign(['tag_id']);
            $table->dropColoumn(['tag_id']);
        });
    }
}
