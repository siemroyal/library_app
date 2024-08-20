@extends("layouts.master")
@section("title","Edit book type")
@section("content")
<div class="bg-gray-100 flex items-center justify-center">
    <div class="w-full max-w-md max-w-full max-w-screen-lg">
      <form method="post" action="{{ route("book_types.update",$book_type->id) }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method("PUT")
        <h2 class="text-2xl font-bold mb-6 text-center">Update book type</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="mb-4">
            <label cl.ass="block text-gray-700 text-sm font-bold mb-2" for="book_type_name">
                Book type name
            </label>
            <input value="{{ old("book_type_name",$book_type->book_type_name) }}" class="@error("book_type_name") border-solid border-2 border-amber-700 @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="book_type_name" name="book_type_name" type="text" placeholder="Book title">
            @error("book_type_name")
                <span class="text-red-600">{{ $message }}</span>
            @enderror  
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                Description
            </label>
            <input type="text" value="{{ old("descrition",$book_type->description) }}" id="description" name="description" class="@error("description") border-solid border-2 border-amber-700 @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
            @error("description")
                <span class="text-red-600">{{ $message }}</span>
            @enderror  
        </div>
        <div class="flex items-center justify-start">
            <button class=" bg-blue-500 mr-1 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Update
            </button>
            <a href="{{ route("book_types.index") }}" class="bg-red-500 hover:bg-white-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Back</a>
        </div>
      </form>
    </div>
</div>
@endsection