@extends("layouts.master")
@section("title","Books")
@section('sidebar')
@endsection
@section("content")


<div class="relative overflow-x-auto shadow-md sm:rounded-md">
    <div class="pb-4 bg-white dark:bg-gray-900 justify-between flex flex-row mt-2">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="text" id="table-search" class="block ml-2 p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
        </div>
        <div>
            <a href="{{ route("books.create") }}" class="rounded px-2 py-2 bg-blue-600 text-white text-bold hover:bg-blue-700 float-right">Create a new book</a>
        </div>
    </div>
    @if( session("success"))
        <p class="text-success">{{ session("success") }}</p>
    @endif
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Book title
                </th>
                <th scope="col" class="px-6 py-3">
                    Publish date
                </th>
                <th scope="col" class="px-6 py-3">
                    Book type
                </th>
                <th scope="col" class="px-6 py-3">
                    Number of page
                </th>
                <th scope="col" class="px-6 py-3">
                    Number of copie
                </th>
                <th scope="col" class="px-6 py-3">
                    Edition
                </th>
                <th scope="col" class="px-6 py-3">
                    Publisher
                </th>
                <th scope="col" class="px-6 py-3">
                    Book source
                </th>
                <th scope="col" class="px-6 py-3">
                    Remarks
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="w-4 p-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $book->book_title }}</td>
                <td class="px-6 py-4">{{ $book->publish_date}}</td>
                <td class="px-6 py-4">{{ $book->book_type->book_type_name}}</td>
                <td class="px-6 py-4">{{ $book->number_of_pages }}</td>
                <td class="px-6 py-4">{{ $book->number_of_copies }}</td>
                <td class="px-6 py-4">{{ $book->edition }}</td>
                <td class="px-6 py-4">{{ $book->publisher }}</td>
                <td class="px-6 py-4">{{ $book->book_source }}</td>
                <td class="px-6 py-4">{{ $book->remarks }}</td>
                <td class="px-6 py-4 flex">
                    <a href="{{ route("books.show",$book->id) }}" class="bg-blue-500 hover:bg-blue-700 mr-1 text-white font-bold py-2 px-4 rounded">View</a>
                    <a href="{{ route("books.edit",$book->id) }}" class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 rounded">Edit</a>
                    <form action="{{ route("books.destroy",$book->id) }}"onclick="return confirm('តើអ្នកពិតជាចង់លុបទិន្នន័យនេះមែនទេ?')" 
                        method="post">
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="Delete" class="bg-red-500 ml-1 hover:bg-red-400 text-white font-bold py-2 px-4 rounded">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="my-2">
        {{ $books->links() }}
    </div>
</div>
@endsection























