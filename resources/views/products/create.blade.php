<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body style='background-color:#d6d6d6;'>
    <div class='container py-5'>
        <div class='text-center mb-4'>
            <a href="/products" class="btn btn-primary">
                <h5>All Product</h5>
            </a>
        </div>
        <h2>Create Products</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class='card p-4 w-50 mt-3'>
            <form method='POST' action="{{ route('products.create') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="title">Product Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group mb-3">
                    <label for="description">Product Description</label>
                    <textarea class="form-control" name="description"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="price">Product Price</label>
                    <input type="text" class="form-control" name="price">
                </div>
                <div class="form-group mb-4">
                    <label for="image">Product Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <button type="submit" class="btn btn-dark w-25">Create</button>
            </form>
        </div>
    </div>
</body>
</html>
