<?php

namespace App\Http\Controllers\api;

use App\Models\Book;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $booksList = Book::paginate(12);
        if (!$booksList) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found',
                'error_code' => 404
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Success to get data',
            'data' => $booksList
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'isbn' => 'required|unique:books',
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'id_category' => 'required|exists:categories,id',
            'pages' => 'required|integer',
            'language' => 'required',
        ]);

        $book = new Book();
        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->id_category = $request->id_category;
        $book->pages = $request->pages;
        $book->language = $request->language;
        $book->publish_date = $request->publish_date;
        $book->subjects = $request->subjects;
        $book->desc = $request->desc;
        $book->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Book created successfully',
            'data' => $book
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'status' => 'error',
                'message' => 'Book not found',
                'error_code' => 404
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Success to get book detail',
            'data' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'status' => 'error',
                'message' => 'Book not found',
                'error_code' => 404
            ], 404);
        }

        $request->validate([
            'isbn' => 'required|unique:books,isbn,' . $book->id,
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'id_category' => 'required|exists:categories,id',
            'pages' => 'required|integer',
            'language' => 'required',
        ]);

        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->id_category = $request->id_category;
        $book->pages = $request->pages;
        $book->language = $request->language;
        $book->publish_date = $request->publish_date;
        $book->subjects = $request->subjects;
        $book->desc = $request->desc;
        $book->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Book updated successfully',
            'data' => $book
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'status' => 'error',
                'message' => 'Book not found',
                'error_code' => 404
            ], 404);
        }

        $book->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Book deleted successfully'
        ]);
    }
}
