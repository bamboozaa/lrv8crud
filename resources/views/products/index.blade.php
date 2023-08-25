@extends('products.layout')
@section('title', 'All Products')

@section('content')
    <div class="row">
        <div class="col-lg-12 my-3">
            <div class="float-start">
                <h2>Laravel 8 CRUD Example</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col" width="280px">Action</th>
            </tr>
        </thead>

        @if (count($products) > 0)
            @foreach ($products as $i => $product)
                <tr>
                    <th>{{ ++$i }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @csrf
                            <a class="btn btn-info" href="{{ route('products.show', $product->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4">ไม่พบข้อมูลที่ท่านต้องการค้นหา</td>
            </tr>
        @endif

    </table>

    {!! $products->links() !!}

@endsection
