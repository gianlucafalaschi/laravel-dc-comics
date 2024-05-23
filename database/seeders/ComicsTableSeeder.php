<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comic;
class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comicsArray = config('comics');

        foreach($comicsArray as $singleComic) {
            $newComic = new Comic();  // crea una nuova istanza del model Comic che corrisponde ad una riga del database
            $newComic->title = $singleComic['title'];
            $newComic->description = $singleComic['description'];
            $newComic->thumb = $singleComic['thumb'];
            $newComic->price = $singleComic['price'];
            $newComic->series = $singleComic['series'];
            $newComic->sale_date = $singleComic['sale_date'];
            $newComic->type = $singleComic['type'];
            $newComic->save();


        }
    }
}
