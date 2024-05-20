<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    public function welcome()
    {
        $books = [
            [
                'id' => 1,
                'image' => 'https://covers.openlibrary.org/b/olid/OL27213498M-M.jpg',
                'title' => "It Ends With Us",
                'short_desc' => "Lily hasn’t always had it easy, but that’s never stopped her from working hard for the life she wants. She’s come a long way from the small town where she grew up—she graduated from college, moved to Boston, and started her own business. And when she feels a spark with a gorgeous neurosurgeon named Ryle Kincaid, everything in Lily’s life seems too good to be true."
            ],
            [
                'id' => 2,
                'image' => 'https://covers.openlibrary.org/b/olid/OL25418275M-M.jpg',
                'title' => "The 48 Laws of Power",
                'short_desc' => "Amoral, cunning, ruthless, and instructive, this piercing work distills three thousand years of the history of power in to forty-eight well explicated laws. As attention--grabbing in its design as it is in its content, this bold volume outlines the laws of power in their unvarnished essence, synthesizing the philosophies of Machiavelli, Sun-tzu, Carl von Clausewitz, and other great thinkers."
            ],
            [
                'id' => 3,
                'image' => 'https://covers.openlibrary.org/b/olid/OL28230579M-M.jpg',
                'title' => "The Subtle Art of Not Giving a Fuck",
                'short_desc' => "This breakout, mega bestseller is the self-help book for people who hate self-help. It’s as much a pat on the back as a slap in the face. It’s the first truly no BS guide to flourishing in a crazy, crazy world—a truly counterintuitive approach to living a good life."
            ],
            [
                'id' => 4,
                'image' => 'https://covers.openlibrary.org/b/olid/OL16980586M-M.jpg',
                'title' => "Rich Dad Poor Dad",
                'short_desc' => "It's been nearly 25 years since Robert Kiyosaki’s Rich Dad Poor Dad first made waves in the Personal Finance arena. It has since become the #1 Personal Finance book of all time... translated into dozens of languages and sold around the world."
            ],
            [
                'id' => 5,
                'image' => 'https://covers.openlibrary.org/b/id/12749873-M.jpg',
                'title' => "It Starts With Us",
                'short_desc' => "Before It Ends with Us, it started with Atlas. Colleen Hoover tells fan favorite Atlas’s side of the story and shares what comes next in this long-anticipated sequel to the “glorious and touching” (USA TODAY) #1 New York Times bestseller It Ends with Us."
            ],
            [
                'id' => 6,
                'image' => 'https://covers.openlibrary.org/b/olid/OL26992991M-M.jpg',
                'title' => "A Court of Mist and Fury",
                'short_desc' => "Feyre has undergone more trials than one human woman can carry in her heart. Though she's now been granted the powers and lifespan of the High Fae, she is haunted by her time Under the Mountain and the terrible deeds she performed to save the lives of Tamlin and his people."
            ],
            [
                'id' => 7,
                'image' => 'https://covers.openlibrary.org/b/olid/OL22856696M-M.jpg',
                'title' => "Harry Potter and the Sorcerer's Stone",
                'short_desc' => "Till now there's been no magic for Harry Potter. He lives with the miserable Dursleys and their abominable son, Dudley. Harry's room is a tiny closet beneath the stairs, and he hasn't had a birthday party in eleven years."
            ],
            [
                'id' => 8,
                'image' => 'https://covers.openlibrary.org/b/id/13180424-M.jpg',
                'title' => "Twisted Love",
                'short_desc' => "He has a heart of ice … but for her, he'd burn the world. Alex Volkov is a devil blessed with the face of an angel and cursed with a past he can't escape. Driven by a tragedy that has haunted him for most of his life, his ruthless pursuits for success and vengeance leave little room for matters of the heart."
            ],
            [
                'id' => 9,
                'image' => 'https://covers.openlibrary.org/b/olid/OL27918581M-M.jpg',
                'title' => "Atomic Habits",
                'short_desc' => "No matter your goals, Atomic Habits offers a proven framework for improving every day."
            ],
            [
                'id' => 10,
                'image' => 'https://covers.openlibrary.org/b/id/10389354-M.jpg',
                'title' => "The Psychology of Money",
                'short_desc' => "Timeless lessons on wealth"
            ]
        ];
        return view('welcome', ['books' => $books]);
    }
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $keyword = $request->search;
            $booksList = Book::where('title', "LIKE", "%$keyword%")
                ->paginate(12);
        } else {
            $booksList = Book::paginate(12);
        }

        return view('/books/index', ['books' => $booksList]);
    }
    public function detail($id)
    {
        $book = Book::findOrFail($id);
        // return $book;
        return view('/books/detail', ['book' => $book]);
    }
    public function tambah()
    {
        $categories = Category::all();
        return view('/books/tambah', ['categories' => $categories]);
    }
    public function store(Request $request)
    {
        // $book = new Book();
        // $book->create($request->all());
        // return redirect()->route('books-index');

        $validate = $request->validate([
            'isbn' => 'required|numeric|min:3',
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'id_category' => 'required',
            'language' => 'required',
            'pages' => 'required|numeric',
            'publish_date' => 'required|date',
            'subjects' => 'required',
            'desc' => 'required',
            'image_path' => 'required|file|max:5000',
        ]);

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);

            $validate['image_path'] = $imageName;
        }

        $book = new Book();
        $book->create($validate);
        return redirect()->route('books-index')->with('status', 'Data Berhasil Ditambahkan');
    }
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('/books/edit', ['book' => $book, 'categories' => $categories]);
    }
    public function put(Request $request, $id)
    {
        $request->validate([
            'isbn' => 'required|min:3',
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'id_category' => 'required',
            'language' => 'required',
            'pages' => 'required|numeric',
            'publish_date' => 'required|date',
            'subjects' => 'required',
            'desc' => 'required',
            'image_path' =>  'file|max:5000',
        ]);
        $imageName = "";
        $book = Book::find($id);
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
            $request['image_path'] = $imageName;

            if ($book->image_path) {
                Storage::delete('public/images/' . $book->image_path);
            }
        } else {
            $imageName = $book->image_path;
        }

        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->id_category = $request->id_category;
        $book->language = $request->language;
        $book->pages = $request->pages;
        $book->publish_date = $request->publish_date;
        $book->subjects = $request->subjects;
        $book->desc = $request->desc;
        $book->image_path = $imageName;
        $book->save();

        return redirect()->route('books-detail', ['id' => $book['id']])->with('status', 'Data Berhasil Edit');;
    }
    public function delete($id)
    {
        $book = Book::findOrFail($id);
        Storage::delete('public/images/' . $book->image_path);
        $book->delete();

        return redirect()->route('books-index')->with('status', 'Data Berhasil Dihapus');
    }
    public function test(Request $request)
    {
        return view('/books/test');
    }
}
