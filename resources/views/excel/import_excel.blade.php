<!DOCTYPE html>
<html>
<head>
    <title>Nhập dữ liệu học sinh</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Nhập dữ liệu sinh viên!
        </div>
        <div>
            @if (has($success))
                    {{ $success }}
            @endif
        </div>
        <div class="card-body">
            <form action="/import_sinh_vien" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>

            </form>
        </div>
    </div>
</div>

</body>
</html>
