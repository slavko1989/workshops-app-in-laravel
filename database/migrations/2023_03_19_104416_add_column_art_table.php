<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('art', function (Blueprint $table) {
            $table->string('title');
            $table->text('text');
            $table->string('begin_at');
            $table->integer('seats')->nullable();

             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('art', function (Blueprint $table) {
        $table->dropColumn('title');
        $table->dropColumn('text');
        $table->dropColumn('begin_at');
        $table->dropColumn('seats');
    });
    }
};
