<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUuidToInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('invoices','uuid')){
            Schema::table('invoices', function (Blueprint $table) {
                $table->uuid('uuid')->unique();
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
        if(Schema::hasColumn('invoices','uuid')){
            Schema::table('invoices', function (Blueprint $table) {
                $table->dropColumn('uuid');
            });
        }
    }
}
