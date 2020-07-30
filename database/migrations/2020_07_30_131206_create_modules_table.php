<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('module_number');
            $table->string('module_name');
        });

        DB::table('modules')->insert(
            array(
                'id' => 1,
                'module_number' => 'DC1240',
                'module_name' => 'Internet Computing'
            )
        );

        DB::table('modules')->insert(
            array(
                'id' => 2,
                'module_number' => 'DC2410',
                'module_name' => 'Internet Applications and Techniques'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
