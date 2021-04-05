<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('backend.books.index', compact('books'));
    }

    public function create()
    {
        return view('backend.books.create');
    }

    public function store(BookRequest $request)
    {
        $book = new Book();
        $book->fill($request->all());

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $book->image = $path;
        }

        $book->save();

        return redirect()->route('book.index')->with('message', 'Thêm dữ liệu thành công..');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('backend.books.edit', compact('book'));
    }

    public function update(BookRequest $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->fill($request->all());

        if ($request->hasFile('image')) {

            $currentImg = $request->file('image');

            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }

            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $book->image = $path;
        }

        $book->save();
        return redirect()->route('book.index')->with('message', 'Cập nhập dữ liệu thành công..');
    }

}
