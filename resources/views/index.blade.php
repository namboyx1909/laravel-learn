<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatile" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="jumbotron">
    <div class="container">
        <h1>Danh muc</h1>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $cart)
            <tr>
                <td>{{ $cart->id }}</td>
                <td>{{ $cart->name }}</td>
                <td>{{ $cart->status == 0 ? 'tam an' : 'hien thi' }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <hr>
        <div>
            {{ $categories->links() }}
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
