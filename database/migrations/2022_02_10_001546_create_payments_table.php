<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('reference_number');
            $table->string('status');
            $table->decimal('amount');
            $table->decimal('fee');
            $table->string('currency');
            $table->boolean('refunded');
            $table->dateTime('refunded_at')->nullable();
            $table->boolean('captured');
            $table->dateTime('captured_at')->nullable();
            $table->dateTime('voided_at')->nullable();
            $table->text('description');
            $table->string('amount_format');
            $table->string('fee_format');
            $table->string('refunded_format');
            $table->string('captured_format');
            $table->string('invoice_id')->nullable();
            $table->string('ip');
            $table->string('callback_url');
            $table->json('source');
            $table->foreignId('user_id');
            $table->softDeletes();
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
        Schema::dropIfExists('payments');
    }
}
