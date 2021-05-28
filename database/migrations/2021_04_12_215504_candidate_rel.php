<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CandidateRel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidates', function (Blueprint $table) {
            //

            $table->uuid('status');
            $table->foreign('status')->references('id')->on('tags')->onDelete('cascade');
            $table->uuid('job_id');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidates', function (Blueprint $table) {
            //
            $table->dropForeign(['job_id']);
            $table->dropColoumn(['job_id']);
            $table->dropForeign(['tag_id']);
            $table->dropColoumn(['tag_id']);
            $table->dropForeign(['user_id']);
            $table->dropColoumn(['user_id']);

        });
    }
}
