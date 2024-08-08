@extends('admin.master')
@section('styles')
<style type="text/css">
    .div_deg {
        display: flex;
        justify-content: center;
        align-item: center;
    }

    label {
        display: inline-block;
        width: 200px;
        padding: 20px;
    }

    input[type='text'] {
        width: 300px;
        height: 60px;
    }

    textarea {
        width: 450px;
        height: 100px;
    }

</style>

@endsection
@section('content')
<h2>Update Product</h2>
<div class="div_deg">
    <form method="post" action="{{ url('edit_product', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <label>
                Title
            </label>
            <input type="text" name="title" value="{{ $product->title }}">
        </div>

        <div>
            <label>
                Description
            </label>
            <textarea name="description">{{ $product->description }}</textarea>
        </div>

        <div>
            <label>
                Price
            </label>
            <input type="text" name="price" value="{{ $product->price }}">
        </div>

        <div>
            <label>
                Quantity
            </label>
            <input type="text" name="quantity" value="{{ $product->quantity }}">
        </div>

        <div>
            <label>
                Category
            </label>
            <select name="category">
                <option value="{{ $product->category }}">{{ $product->category }}</option>
                @foreach ($categories as $category)
                <option value="{{ $category->category_name }}">
                    {{ $category->category_name }}
                </option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Current Image</label>
            <img width="150" src="/products/{{ $product->image }}">
        </div>

        <div>
            <label>New Image</label>
            <input type="file" name="image">
        </div>
        <div>
            <input class="btn btn-success" type="submit" value="Update Product">
        </div>
    </form>
</div>

@endsection
