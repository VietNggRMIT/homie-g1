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
        Schema::create('review', function (Blueprint $table) {
            $table->id();
            $table->text('review_name')->nullable();
            $table->text('review_description');
            $table->integer('review_rating');
            $table->unsignedBigInteger('listing_id');
            $table->foreign('listing_id')
                ->references('id')
                ->on('listing')
                ->onUpdate('cascade')
                ->onDelete('cascade');
//            $table->timestamps();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review');
    }
};
