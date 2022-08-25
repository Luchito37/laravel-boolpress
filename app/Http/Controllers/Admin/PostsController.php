<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostsController extends Controller
{

    //questa funzione ritornanun un elemneto cercandolo per il suo slug
    private function findBySlug($slug)
    {
        $post = Post::where("slug", $slug)->first();

        if (!$post) {
            abort(404);
        }

        return $post;
    }

    private function generateSlug($text)
    {
        $toReturn = null;

        $counter = 0;
        do {
            //genero uno slug partendo dal titolo
            $slug = Str::slug($text);

            //se il counter è maggiore di zero, allego al suo valore lo slug
            if ($counter > 0) {

                $slug .= "-" . $counter;
            }

            //controllo nel databse se esiste un slug uguale 
            $slug_exist = Post::where("slug", $slug)->first();

            if ($slug_exist) {
                //se esiste lo slug incremento il valore del counter per il giro successivo
                $counter++;
            } else {
                //altrimenti salvo lo slugnei dati del nuovo post
                $toReturn = $slug;
            }
        } while ($slug_exist);

        return $toReturn;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::orderBy("created_at", "desc")->get();

        // questa condizione viene fatta per poter suddividere la visine dei post per singolo utente
        // in modo tale che l'utente possa vedere solo i propri post mentre l'admin tutti quanti
        $user = Auth::user();
        if ($user->role === "admin") {
            $posts = Post::orderBy("created_at", "desc")->get();
        } else {
            $posts = $user->posts;
        }


        return view("admin.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view("admin.posts.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validazione dei dati

        $validatedData = $request->validate([
            "title" => "required|min:10",
            "content" => "required|min:10",
            // preciso l'esistenza dell'"id" della colonna categories per una sicurezza ulteriore nei confronti
            // dei malintenzionati
            "category_id" => "required|exists:categories,id"
        ]);

        //salvo i dati nel database
        $post = new Post();

        $post->fill($validatedData);

        $post->user_id = Auth::user()->id;

        /* $slug = Str::slug($post->title);
        $slug_exist = Post::where("slug", $slug)->first;

        if (!$slug_exist) {
            $post->slug = $slug;
        }else{
            $counter = 1;
            $new_slug = $slug . "-" . $counter;
            $slug_exist = Post::where("slug", $slug)->first();

        }*/

        /*$counter = 0;

        do{
            //genero uno slug partendo dal titolo
            $slug = Str::slug($post->title);

            //se il counter è maggiore di zero, allego al suo valore lo slug
            if($counter > 0){
                
                $slug .="-" . $counter;
            }
            
            //controllo nel databse se esiste un slug uguale 
            $slug_exist = Post::where("slug", $slug)->first();

            if($slug_exist){
                //se esiste lo slug incremento il valore del counter per il giro successivo
                $counter++;
            }else{
                //altrimenti salvo lo slugnei dati del nuovo post
                $post->slug = $slug;
            }

        }while($slug_exist);*/

        //grazie alla funzione creta sopra posso scrivere :
        $post->slug = $this->generateSlug($post->title);

        $post->save();


        //redirect nella pagina che vogliamo 

        return redirect()->route("admin.posts.show", $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //first() intendiamo il primo elementop con quel nome (slug)

        //con lo slug siamo obbligati non utilizzare il findOrFail ma il where
        /*$post = Post::where("slug", $slug)->first();*/

        $post = $this->findBySlug($slug);

        return view("admin.posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        /*$post = Post::where("slug", $slug)->first();*/

        $post = $this->findBySlug($slug);

        return view("admin.posts.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        $validatedData = $request->validate([
            "title" => "required|min:10",
            "content" => "required|min:10"
        ]);

        /*$post = Post::where("slug", $slug)->first();*/
        $post = $this->findBySlug($slug);

        if ($validatedData["title"] !== $post->title) {
            //genero un nuovo slug
            $post->slug = $this->generateSlug($validatedData["title"]);
        }

        $post->update($validatedData);

        return redirect()->route("admin.posts.show", $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = $this->findBySlug($slug);

        $post->delete();

        return redirect()->route("admin.posts.index");
    }
}
