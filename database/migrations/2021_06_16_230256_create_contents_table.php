<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->unsignedSmallInteger('duration');
            $table->string('year', 4);
            $table->boolean('is_serie')->default(0);
            $table->unsignedSmallInteger('seasons')->default(0);
            $table->string('image_path');
            $table->string('link_path');
            $table->timestamps();
            //$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
