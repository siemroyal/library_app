<?php
namespace App\Http\Controllers;
use App\Models\BookType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$book_types = DB::table("book_types")->paginate(2);
        $book_types = BookType::with("books:id,book_title")->paginate(10);
        return view('book_types/index',compact('book_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book_types/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Check validation
        $valiated = $request->validate([
            "book_type_name" => 'required',
            "description" => 'required',
        ]);
        //Insert data
        $book_types = DB::table("book_types")->insert([
            "book_type_name" => $request->input('book_type_name'),
            "description" => $request->input("description")
        ]);
        if(!$book_types){
            return redirect()->route("book_types.create")->with("error","Inserting book type name error");
        }else{
            return redirect()->route("book_types.index")->with("success","Book type inserted successfully");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {   
        $book_type = BookType::find($id);
        //$book_type = DB::table("book_types")->where("id","=",$bookType->id)->first();
        //$book_type = DB::table("book_types")->find($id);
        if(!$book_type){
            return redirect()->route("book_types.index")->with("error","Book type not found");
        }
            return view("book_types.show",compact("book_type"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookType $bookType)
    {
        $book_type = DB::table("book_types")->where("id","=",$bookType->id)->first();
        if(!$book_type){
            return redirect()->route("book_types.index")->with("error","Book type not found");
        }
            return view("book_types.edit",compact("book_type"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookType $bookType)
    {
        //Check validation
        $valiated = $request->validate([
            "book_type_name" => 'required',
            "description" => 'required',
        ]);
        //Update data
        $bookType->update([
            "book_type_name" => $request->input('book_type_name'),
            "description" => $request->input("description")
        ]);
        if(!$bookType){
            return redirect()->route("book_types.create")->with("error","Updating book type name error");
        }else{
            return redirect()->route("book_types.index")->with("success","Book type updated successfully");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        //$book_type = DB::table("book_types")->where("id","=",$id)->first();
        $book_type = BookType::find($id);
        if($book_type){
            //DB::table("book_types")->where("id","=",$id)->delete();
            return redirect()->route("book_types.index")->with("success","Deleted book type successfully");
        }else{
            return redirect()->route("book_types.index")->with("error","Can not delete book type");
        }

        // if($bookType){
        //     $bookType->delete();
        //     return redirect()->route("book_types.index")->with("success","Deleted book type successfully");
        // }else{
        //     return redirect()->route("book_types.index")->with("error","Can not delete book type");
        // }
    }
}
