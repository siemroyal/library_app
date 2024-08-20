<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(){
        //Eloquent
        //$books = Book::paginate(5);
        // $books = DB::table('books')
        // ->join('book_types',"books.book_type_id","=","book_types.id")
        // ->select("books.*","book_types.book_type_name")
        // ->paginate(10);
        $books = Book::with("book_type:id,book_type_name")->paginate(10);
        return view("books.index",["books" => $books]);
    }
    public function show($id){
        //Eloquent
        //$book = Book::findOrFail($id);
        $book = Book::where(['id' => $id])->first();
        //dd($book);
        return view("books.show",compact("book"));
    }
    public function create(){
        $book_types = BookType::orderBy('book_type_name')->get();
        return view("books.create",["book_types" => $book_types]);
    }
    public function store(Request $request){
        //$data = $request->all();
        //$books = Book::create($data);
        // Book::create([
        //     "book_title" => $request->book_title,
        //     "publish_date" => $request->publish_date,
        //     "book_type_id" => $request->book_type_id,
        //     "number_of_pages" => $request->number_of_pages,
        //     "number_of_copies" => $request->number_of_copy,
        //     "edition" => $request->edition,
        //     "publisher" => $request->publisher,
        //     "book_source" => $request->book_source,
        //     "remarks" => $request->remark
        // ]);
        //Validation
        $validated = $request->validate([
            "book_title" => ["required","max:125"],
            "publish_date" => ["required"],
            "book_type_id" => ['required'],
            "number_of_page" => ['required'],
            "number_of_copy" => ['required'],
            "edition" => ['required'],
            "publisher" => ['required'],
            "book_source" => ['required'],
        ]);
        
        $books = new Book();
        $books->book_title = $request->book_title;
        $books->publish_date = $request->publish_date;
        $books->book_type_id = $request->book_type_id;
        $books->number_of_pages = $request->number_of_pages;
        $books->number_of_copies = $request->number_of_copy;
        $books->edition = $request->edition;
        $books->publisher = $request->publisher;
        $books->book_source = $request->book_source;
        $books->remarks = $request->remark;
        $books->save();
        
        if($books){
            return redirect()->route('books.index')->with("success","Book created successful");
        }
    }
    public function edit($id){
        $book = Book::find($id);
        $book_types = BookType::orderBy('book_type_name')->get();
        if($book){
            return view("books.edit",compact("book","book_types"));
        }
    }
    public function update(Request $request,$id){
        $book = Book::find($id);
        if($book){
            $book->book_title = $request->book_title;
            $book->publish_date = $request->publish_date;
            $book->book_type_id = $request->book_type_id;
            $book->number_of_pages = $request->number_of_pages;
            $book->number_of_copies = $request->number_of_copy;
            $book->edition = $request->edition;
            $book->publisher = $request->publisher;
            $book->book_source = $request->book_source;
            $book->remarks = $request->remark;
            $book->save(); 
            return redirect()->route('books.index')->with("success","Book created successful");
        }
        return redirect()->route('books.index')->with("error","Error book created");
    }
    public function destroy($id){
        $book = Book::find($id);
        if($book){
            $book->delete();
            return redirect()->route('books.index')->with("success","Book deleted successful");
        }
        return redirect()->route('books.index')->with("error","Error book deleted");
    }
}

