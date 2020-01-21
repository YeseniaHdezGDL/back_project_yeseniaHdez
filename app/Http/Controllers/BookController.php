<?php

namespace App\Http\Controllers;

use App\Books;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function check()
    {
        return 'Si lees esto, todo bien :)';
    }

    public function getBooks()
    {
        return response()->json(Books::all());
    }

    public function getOneBook($id)
    {
        $book = Books::find($id);

        if (empty($book))
        {
            return response()->json('El libro que buscas no existe');
        }
        return response()->json($book,200);
    }

    public function storeBook(Request $request)
    {
        $this->validate($request, [
            'name' => 'required | string',
            'author' => 'required | string',
            'year' => 'required | integer',
            'country' => 'required | string',
            'nobel' => 'required | boolean',
        ]);

        $newBook = Books::create($request->all());

        return response()->json($newBook, 201);
    }

    public function updateBook(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required | string',
            'author' => 'required | string',
            'year' => 'required | integer',
            'country' => 'required | string',
            'nobel' => 'required | boolean',
        ]);

        $book = Books::find($id);

        if (empty($book)) {
            return response()->json('El libro que quieres actualizar no existe');
        }

        $book->update($request->all());;

        return response()->json($book,200);
    }

    public function destroyBook($id)
    {
        $book = Books::find($id);

        if (empty($book)) {
            return response()->json('El libro que quieres borrar no existe');
        }

        $book->delete();

        return response('El libro se borró, éxito', 200);
    }
}
