@extends("layouts.master")
@section("title","Create book type")
@section("content")
<div class="bg-gray-100 flex items-center justify-center">
    <div class="w-full max-w-md max-w-full max-w-screen-lg">
        <ul>
            <li>Book type name: {{ $book_type->book_type_name}}</li>
            <li>Book type description: {{ $book_type->description }}</li>
            <li>Book type description: {{ $book_type->created_at }}</li>
            <li>Book type description: {{ $book_type->updated_at }}</li>
        </ul>
        <a href="{{ route("book_types.index") }}">Back to list</a>
    </div>
</div>
@endsection