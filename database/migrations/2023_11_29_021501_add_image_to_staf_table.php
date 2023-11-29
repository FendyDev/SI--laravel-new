<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToStafTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staf', function (Blueprint $table) {
            $table -> string('image') -> nullable() -> after('level')-> default('profile.png');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('staf', function (Blueprint $table) {
            Schema::dropIfExists('image');
        });
    }
}
