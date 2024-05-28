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
        
        return view('comics.index', $data);   // index si trova nella cartella comics. Con view devo usare la dot.notation
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    /* create ha il solo compito di mostrare il form (che inviera' i dati allo store) */
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
        // validazione dei dati del form prima di proseguire con il resto del codice
        $validated = $request->validate(
            [
                'title' => 'required|max:98',
                'description' => 'required|min:5|max:2000',
                'thumb' => 'required|max:300',
                'price' => 'required|numeric', 
                'series' => 'required|max:198',  
                'sale_date' => 'required|date',  
                'type' => 'required|max:98',  
            ],

            [
                'title.required' => 'Aggiungi il titolo',
                'title.max' => 'Il titolo deve essere massimo 98 caratteri',
                'description.required' => 'Aggiungi la descrizione',
                'description.min' => 'La descrizione deve essere minimo 5 caratteri',
                'description.max' => 'La descrizione deve essere massimo 2000 caratteri',
                'thumb.required' => 'Aggiungi l\'immagine',
                'thumb.max' => 'L\'immagine deve essere massimo 300 caratteri',
                'price.required' => 'Aggiungi il prezzo',
                'price.numeric' => 'Il prezzo deve essere un numero',
                'series.required' => 'Aggiungi la serie',
                'series.max' => 'La serie deve essere massimo 198 caratteri',
                'sale_date.required' => 'Aggiungi la data di uscita',
                'sale_date.date' => 'La data di uscita deve essere in formato data gg/mm/aa', 
                'type.required' => 'Scegli il tipo tra le opzioni', 
                'type.max' => 'Il tipo deve essere massimo 98 caratteri', 

            ]
    
    );



        $formData = $request->all();
        
        // Creare nuova riga nel database  quando l'utente invia il form
        
        $newComic = new Comic();
        
        //metodo senza mass assignment

        // $newComic->title = $formData['title'];  /* uso le parentesi quadre perchè ho un array associativo */
        // $newComic->description = $formData['description'];
        // $newComic->thumb = $formData['thumb'];
        // $newComic->price = $formData['price'];
        // $newComic->series = $formData['series'];
        // $newComic->sale_date = $formData['sale_date'];
        // $newComic->type = $formData['type'];
        // $newComic->save();

        /* metodo con mass assignment, (si usano solo con dati che non possono essere rischiosi) le colonne vengono autorizzate nel model */
        $newComic->fill($formData);
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
        $comic = Comic::findOrFail($id);
        //dd($comic);

        $data = [
            'comic' => $comic
        ];


        return view('comics.edit', $data);
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
        $comic = Comic::findOrFail($id);

        $formData = $request->all();
        
        $comic->update($formData);
        
         // dopo aver aggiornato un elemento, mandiamo l'utente alla pagina dell'elemento aggiornato
         return redirect()->route('comics.show', ['comic' => $comic->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);   // prendo l'entitá da cancellare
        $comic->delete();                  // l'entita' viene cancellata

        return redirect()->route('comics.index');   // utente reindirizzado alla index con tutti i prodotti
    }
}
