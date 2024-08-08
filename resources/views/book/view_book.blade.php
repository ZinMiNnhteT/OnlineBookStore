@extends('admin.master')
@section('styles')
<style type="text/css">
    .div_deg {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
    }

    .table_deg {
        text-align: center;
        margin: auto;
        border: 2px solid yellowgreen;
        margin-top: 5px;
        width: 600px;
    }

    th {
        background-color: skyblue;
        padding: 15px;
        font-size: 20px;
        font-weight: bold;
        color: white;
    }

    td {
        color: white;
        padding: 10px;
        border: 1px solid skyblue;
        vertical-align: middle;

    }

    .table-container {
        overflow-x: auto;
        max-width: 100%;
        /* Adjust the width as needed */
    }

    .table-container .table {
        width: 100%;
        white-space: nowrap;
    }

    input[type='search'] {
        width: 400px;
        height: 45px;
        margin-left: 50px;
    }

    .fixed-form {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

</style>

@endsection
@section('content')
<div class="table-container">

    <form action="{{ url('book_search') }}" method="GET">
        @csrf
        <input type="search" name="search">
        <input type="submit" class="btn btn-secondary" value="Search">
        <button type="button" class="btn btn-secondary pull-right" onclick=" window.history.back();"> Back</button>

    </form>

    <table class="table_deg table table-striped table-bordered table-hover">

        <tr>
            <th>#</td>
            <th>Book Title</th>
            <th>Author</th>
            <th>Description</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Publish Year</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        @foreach ($books as $key=>$book)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author ? $book->author->name : 'N/A' }}
            <td>{!!Str::words($book->description,5)!!}</td>
            <td>{{ $book->category ? $book->category->category_name : 'N/A' }}</td>
            <td>{{ $book->price }}</td>
            <td>{{ $book->quantity }}</td>
            <td>{{ $book->publish_year }}</td>
            <td>
                <img height="50" width="80" src="books/{{ $book->image }}">
            </td>
            <td>
                <a href="{{ url('update_book', $book->id) }}">
                    <button type="button" class="btn btn-primary">Edit</button>
                </a>

                <form action="{{ url('delete_book', $book->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

            </td>

        </tr>

        @endforeach

    </table>
</div>
<div class="div_deg">
    {{ $books->onEachSide(1)->links() }}
</div>

@endsection
