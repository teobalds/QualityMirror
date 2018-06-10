<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';

            $table->increments('id');
            $table->text('question');
            $table->boolean('use_for_existing')->default(true);
            $table->boolean('use_for_new')->default(true);
            $table->boolean('use_for_ios');
            $table->boolean('use_for_android')->default(true);
            $table->enum('type', ['onlyone', 'multiple']);
            $table->enum('group', ['development', 'quality', 'marketing', 'maintanance']);
            $table->boolean('enabled')->default(true);
            $table->timestamps();

            $table->index('use_for_existing');
            $table->index('use_for_new');
            $table->index('use_for_ios');
            $table->index('use_for_android');
            $table->index('enabled');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
