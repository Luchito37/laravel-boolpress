<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDatailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_datails', function (Blueprint $table) {
            $table->id();

            //Colonna che rappresenta la foreign key
            //il nome deve essere composto da :
            //- nome tabella a cui fa riferimento al singolare
            //- nome colonna a cui fa riferimento
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id') // la colonna user_id sarà una foreign
                ->references('id') // la foreign ey, farà riferimento ad una colona "id"
                ->on('users'); // presente nella tabella "users"

            // versione dell creazione della foreign key semplificata :

            /*$table->foreignId('user_id')
                ->constrained();*/


            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('phone_number')->nullable();
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
        Schema::dropIfExists('user_datails');
    }
}
