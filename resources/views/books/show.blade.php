@extends("layouts.master")
@section("title","Show book")

@section("sidebar")

@endsection
@section("content")
<div class="container mx-auto py-2"
    <ul class="list-none hover:list-disc">
        <li>{{ $book->publish_date }}</li>
        <li>{{ $book->book_type_id  }}</li>
        <li>{{ $book->number_of_pages }}</li>
        <li>{{ $book->number_of_copies }}</li>
        <li>{{ $book->edition }}</li>
        <li>{{ $book->publisher }}</li>
        <li>{{ $book->book_source }}</li>
        <li>{{ $book->remarks }}</li>
        <li>{{ $book->created_at }}</li>
        <li>{{ $book->updated_at }}</li>
    </ul>
    <a href="{{ route("books.index") }}" class="bg-red-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to book list</a>
</div>
@endsection