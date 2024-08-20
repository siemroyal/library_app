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
            <a href="{{ route("book_types.create") }}" class="rounded px-2 py-2 bg-blue-600 text-white text-bold hover:bg-blue-700 float-right">Create a new book</a>
        </div>
    </div>
    @if( session("success"))
        <p class="text-success">{{ session("success") }}</p>
    @endif
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Book Type Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Book Title form parent
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($book_types as $book_type)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $book_type->book_type_name}}
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $book_type->books}}
                </td>
                <td class="px-6 py-4 flex">
                    <a href="{{ route("book_types.show",$book_type->id) }}" 
                        class="bg-blue-500 hover:bg-blue-700 mr-1 text-white font-bold py-2 px-4 rounded">View</a>
                    <a href="{{ route("book_types.edit",$book_type->id) }}" 
                        class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 rounded">Edit</a>
                    <form action="{{ route("book_types.destroy",$book_type->id) }}"
                         onclick="return confirm('តើអ្នកពិតជាចង់លុបទិន្នន័យនេះមែនទេ?')" 
                        method="post">
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="Delete" 
                        class="bg-red-500 ml-1 hover:bg-red-400 text-white font-bold py-2 px-4 rounded">
                    </form>
                </td>
            </tr>
            @empty
                <td class="text-center">No records found.</td>
            @endforelse
        </tbody>
    </table>
    <div class="my-2 mr-2">
        {{ $book_types->links() }}
    </div>
</div>
@endsection