<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug")->unique();
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
        Schema::dropIfExists('categories');
    }
}


/*
public function up()
    {
        Schema::table('posts', function (Blueprint $table) {

            //pongo la colonna nullable perchè di dafault la categoria risulterebbe vuota e la migration non andrebbe a buon fine 
            $table->unsignedBigInteger("category_id")->nullable()->after("user_id");
            $table->foreign("category_id")
                ->references("id")
                ->on("cotegories");
        });
    }

    public function down()
    {
        Schema::table('posts_tab', function (Blueprint $table) {
            // per cancellare una foreign key devo fare :
                
                //rimuove la relazione
                $table->dropForeign('posts_category_id_foreign');

                //rimuove la colonna
                $table->dropColumn('category_id');
        });
    }
}
*/