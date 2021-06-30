<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();                        
            $table->foreignId('content_id')->constrained()->onDelete('cascade');//Llave foránea del contenido
            $table->unsignedSmallInteger('season');
            $table->text('description');
            $table->string('year', 4);
            $table->unsignedSmallInteger('chapters')->default(0);
            $table->string('image_path', 2048)->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->default(Carbon::now()->toDateTimeString());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seasons');
    }
}
