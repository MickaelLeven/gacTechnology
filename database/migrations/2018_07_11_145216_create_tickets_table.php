<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        
        Schema::create('tickets', function (Blueprint $table) {
        
            $table->increments('id');
            $table->integer('account_invoice');
            $table->integer('invoice_id');
            $table->integer('customer_id');
            $table->date('date');
            $table->string('time',10);
            $table->time('duration')->nullable();
            $table->time('duration_invoice')->nullable();
            $table->string('type', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        
        Schema::dropIfExists('tickets');
    }
}
