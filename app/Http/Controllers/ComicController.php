<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource. 
     *  
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();   // per prendere tutti i fumetti utilizzo il Model (che ho importato sopra )

        $data = [
            'comics' => $comics
        ];
        
        return view('comics.index', $data);   // index si troca nella cartella comics. Con view devo usare la dot.notation
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->all();
        
        // Creare nuova riga nel database
        $newComic = new Comic();
        $newComic->title = $formData['title'];
        $newComic->description = $formData['description'];
        $newComic->thumb = $formData['thumb'];
        $newComic->price = $formData['price'];
        $newComic->series = $formData['series'];
        $newComic->sale_date = $formData['sale_date'];
        $newComic->type = $formData['type'];
        $newComic->save();
        
        // quando l'utente crea un nuovo comic, lo reindirizzo alla pagina del singolo comic aggiunto
        return redirect()->route('comics.show', ['comic' => $newComic->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //$comic = Comic::find($id);    // per prendere il singolo fumetto uso il model e con find gli passo l'id
       $comic = Comic::findOrFail($id);    // per prendere il singolo fumetto uso il model e con find gli passo l'id .  Con findOrFail invece di find se l'id non esiste mi da' in automatico la pagina con errore 404

       $data = [
            'comic' => $comic
       ];
        
        return view('comics.show', $data); // show si trova nella cartella comics. Con view devo usare la dot.notation
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
