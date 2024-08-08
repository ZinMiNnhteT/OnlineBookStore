@extends('admin.master')
@section('styles')
<style type="text/css">
    .div_deg {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
    }

    h1 {
        color: white;
    }

    label {
        display: inline-block;
        width: 200px;
        font-size: 18px !important;
        color: white !important;
    }

    input[type='text'] {
        width: 300px;
        height: 50px;
    }

    textarea {
        width: 300px;
        height: 50px;
    }

    .input_deg {
        padding: 15px;
    }

    .input_deg select {
        width: 300px;
        height: 50px;
        padding: 5px;
        font-size: 16px;
    }

    .input_deg input[type="number"] {
        width: 300px;
        height: 50px;
        padding: 5px;
        font-size: 16px;
        box-sizing: border-box;
    }

</style>
@endsection
@section('content')
<h1>Add Book</h1>
<div class="div_deg">
    <form action="{{ url('store_book') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="input_deg">
            <label>Book Title</label>
            <input type="text" name="title">
        </div>

        <div class="input_deg">
            <label>Description</label>
            <textarea name="description" required></textarea>
        </div>

        <div class="input_deg">
            <label>Price</label>
            <input type="text" name="price" />
        </div>

        <div class="input_deg">
            <label>Quantity</label>
            <input type="number" name="qty">
        </div>

        <div class="input_deg">
            <label>Publish Year</label>
            <input type="number" name="publish_year" min="1999" max="2024" step="1">
        </div>

        <div class="input_deg">
            <label>Book category</label>
            <select name="category_id" required>
                <option value="">Select a Option</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input_deg">
            <label>Author</label>
            <select name="author_id" required>
                <option value="">Select a Option</option>
                @foreach($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input_deg">
            <label>Book Image</label>
            <input type="file" name="image">
        </div>

        <div class="input_deg">
            <input class="btn btn-success" type="submit" value="Add Book">
        </div>

    </form>
</div>

@endsection
