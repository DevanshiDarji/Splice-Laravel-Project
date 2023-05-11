<!DOCTYPE html>
<html>
<head>
    <title>Custom Auth in Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="#">Splice Laravel Page</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register-user') }}">Register</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>

    </nav>
    @yield('content')
    <div class="container">
        <h1>Products</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($products) && $products->count())
                    @foreach($products as $key => $value)
                        <tr>
                            <td>{{$value->name}}</td>
                            <td>{{$value->description}}</td>
                            <td>{{$value->price}}</td>
                            <td>{{$value->image}}</td>
                            <td>{{$value->quantity}}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="10">There is no products available.</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {!! $products->links() !!}
    </div>
</body>
</html>