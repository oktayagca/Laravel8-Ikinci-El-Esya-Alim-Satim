<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title',150);
            $table->string('keywords')->nullable();;
            $table->string('description')->nullable();;
            $table->string('company',150)->nullable();;
            $table->string('address',150)->nullable();;
            $table->string('phone',20)->nullable();;
            $table->string('fax',20)->nullable();;
            $table->string('email',75)->nullable();;
            $table->string('smtpServer',75)->nullable();;
            $table->string('smtpEmail',75)->nullable();;
            $table->string('smtpPassword',15)->nullable();;
            $table->integer('smtpPort')->nullable()->default(0);
            $table->string('facebook',100)->nullable();;
            $table->string('instagram',100)->nullable();
            $table->string('twitter',100)->nullable();
            $table->string('youtube',100)->nullable();
            $table->text('aboutUs')->nullable();
            $table->text('contact')->nullable();
            $table->text('references')->nullable();
            $table->string('status',100)->nullable();
            $table->timestamps();//created at, updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
