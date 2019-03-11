<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1548475515SafezonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('safezones')) {
            Schema::create('safezones', function (Blueprint $table) {
                $table->increments('id');
                $table->string('lat')->nullable();
                $table->string('lng')->nullable();
                $table->string('address')->nullable();
                $table->string('place_name')->nullable();
                
                $table->timestamps();
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('safezones');
    }
}
