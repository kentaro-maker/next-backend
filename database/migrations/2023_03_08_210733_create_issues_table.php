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
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->string('author_name');
            $table->string('author_yomi');
            $table->string('author_gender');
            $table->text('author_profile');
            $table->string('author_interpretation_name');
            $table->text('author_interpretation_profile');
            $table->json('script_text');
            $table->json('script_yomi');
            $table->string('classification');
            $table->string('anthology');
            $table->string('theme');
            $table->text('meaning');
            $table->text('interpretation');
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
        Schema::dropIfExists('issues');
    }
};
