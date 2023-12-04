<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        // Auth::user()->authorizeRoles('admin');


    }

    public function index()
    {
        // Auth::user()->authorizeRoles('admin');

        // if(!Auth::user()->hasRole('admin')){
        //     return to_route('user.books.index');
        // }
        
        $books = Book::paginate(10);

        return view('admin.books.index', [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required|max:500',
          //  'author' =>'required',
            //'book_image' => 'file|image|dimensions:width=300,height=400'
            'book_image' => 'file|image',
            'publisher_id' => 'required',
            'authors' =>['required' , 'exists:authors,id']
        ]);

        $book_image = $request->file('book_image');
        $extension = $book_image->getClientOriginalExtension();
        $filename = date('Y-mm-d-His') . '_' . $request->title . '.' . $extension;

        dd($filename);

        $book_image->storeAs('public/images', $filename);

        $book = Book::create([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'book_image' => $filename,
        //    'author' => $request->author,
            'publisher_id' => $request->publisher_id
        ]);

        return to_route('admin.books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);

        return view('admin.books.show', [
            'book' => $book 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
