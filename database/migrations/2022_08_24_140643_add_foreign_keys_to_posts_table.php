<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //Colonna che rappresenta la foreign key
            //il nome deve essere composto da :
            //- nome tabella a cui fa riferimento al singolare
            //- nome colonna a cui fa riferimento
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id') // la colonna user_id sarà una foreign
                ->references('id') // la foreign ey, farà riferimento ad una colona "id"
                ->on('users'); // presente nella tabella "users"
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // per cancellare una foreign key devo fare :

                $table->dropForeign('posts_user_id_foreign');

                $table->dropColumn('user_id');
        });
    }
}
