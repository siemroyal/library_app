@extends("layouts.master")
@section("title","Create book")
@section("sidebar")
    
@endsection
@section("content")
<div class="bg-gray-100 flex items-center justify-center">
    <div class="w-full max-w-md max-w-full max-w-screen-lg">
      <form method="post" action="{{ route("books.update",[$book->id])}}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method("PUT")
        <h2 class="text-2xl font-bold mb-6 text-center">Update book</h2>
        {{-- @if($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-600">{{ $error}}</li>
                @endforeach
            </ul>
        @endif --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="book_title">
                Book title
            </label>
            <input value="{{ old("book_title",$book->book_title) }}" class="@error("book_title") border-solid border-2 border-amber-700 @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="book_title" name="book_title" type="text" placeholder="Book title">
            @error("book_title")
                <span class="text-red-600">{{ $message }}</span>
            @enderror  
        </div>
    
            <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="publish_date">
                Publish date
            </label>
            <input value="{{ old("publish_date",$book->publish_date) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="publish_date" name="publish_date" type="date" placeholder="Publish date">
            @error("publish_date")
                <span class="text-red-600">{{ $message }}</span>
            @enderror     
        </div>
    
            <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="book_type_id">
                Book type
            </label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 form-select appearance-none row-start-1 col-start-1 bg-slate-50 dark:bg-slate-800 leading-tight focus:outline-none focus:shadow-outline" id="book_type_id">
                <option value="0">Choose a book type</option>
                @forelse ($book_types as $book_type)
                    <option value="{{$book_type->id}}" {{ $book_type->id == $book->book_type_id ? "selected" : ""}} >{{ $book_type->book_type_name }}</option>
                @empty
                    <p>No record</p>
                @endforelse
                
            </select>
            @error("book_type_id")
                <span class="text-red-600">{{ $message }}</span>
            @enderror  
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="number_of_page">
                Number of page
                </label>
                <input value="{{ old("number_of_page",$book->number_of_pages) }}"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="number_of_page" name="number_of_page" type="number" placeholder="Number of page">
            @error("number_of_page")
                <span class="text-red-600">{{ $message }}</span>
            @enderror  
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="number_of_copy">
                Number of copy
                </label>
                <input value="{{ old("number_of_copy",$book->number_of_copies) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="number_of_copy" name="number_of_copy" type="number" placeholder="Number of copy">
            @error("number_of_copy")
                <span class="text-red-600">{{ $message }}</span>
            @enderror  
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="edition">
                Edition
                </label>
                <input value="{{ old("edition",$book->edition) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="edition" name="edition" type="text" placeholder="Edition">
            @error("edition")
                <span class="text-red-600">{{ $message }}</span>
            @enderror 
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="publisher">
                Publisher
                </label>
                <input value="{{ old("publisher",$book->publisher) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="publisher" name="publisher" type="text" placeholder="Publisher">
            @error("publisher")
                <span class="text-red-600">{{ $message }}</span>
            @enderror 
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="book_source">
                Book source
                </label>
                <input value="{{ old("book_source",$book->book_source) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="book_source" name="book_source" type="text" placeholder="Book source">
            @error("book_source")
                <span class="text-red-600">{{ $message }}</span>
            @enderror 
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="remark">
                Remark
                </label>
                <input value="{{ old("remark",$book->remarks) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="remark" name="remark" type="text" placeholder="Remark">
            </div>
        </div>
        <div class="flex items-center justify-start">
            <button class="bg-blue-500 mr-1 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Update
            </button>
            <a href="{{ route("books.index") }}" class="bg-red-500 hover:bg-white-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Back</a>
        </div>
      </form>
    </div>
</div>
@endsection