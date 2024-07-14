<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body style='background-color:#d6d6d6;'>
    <div class="container">
        <div class='my-5 text-center'>
            <a href="products/create" class="btn btn-primary">
                <h5>Create New Product</h5>
            </a>
        </div>
        @if (session('add_successful'))
        <div class="alert alert-success">
            {{ session('add_successful') }}
        </div>
        @endif
        @if (session('edit_successful'))
        <div class="alert alert-success">
            {{ session('edit_successful') }}
        </div>
        @endif
        @if (session('edit_delete'))
        <div class="alert alert-danger">
            {{ session('edit_delete') }}
        </div>
        @endif
        <div class="row align-items-center">
            @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>{{$product['title']}}</h3>
                        <img src="{{ asset('storage/' . $product['image']) }}" style="width:100%;height:200px;object-fit:cover;">
                    </div>
                    <div class="card-body">
                        <h6>{{$product['price'] / 100 }} ₾</h6>
                        <p>{{$product['description']}}</p>
                        <div class='d-inline-block'>
                            <a href="{{ route('products.edit', [$product['id']]) }}" class="btn btn-dark mr-3">Edit</a>
                        </div>
                        <div class='d-inline-block'>
                            <form method='POST' action='{{ route('products.delete', [$product['id']]) }}'>
                                @csrf
                                @method('DELETE')
                                <button type='submit' class='btn btn-danger'>Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
