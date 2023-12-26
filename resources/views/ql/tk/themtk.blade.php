<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VM Shop</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('admin')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('admin/bot/css')}}/sb-admin-2.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/0e2b80c1a7.js" crossorigin="anonymous"></script>
</head>

<body id="page-top">
    @if(session()->has('user'))
    @foreach(session('user') as $user)
    @if($user['email']=='admin@1')
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('ql.pages.sidebar')
        @include('ql.pages.top')
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Thêm Tài Khoản</h1>

            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('tk.add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="ma-tk" class="form-label">ID Tài Khoản:</label>
                            <input type="text" class="form-control form-control-sm" style="width: 500px;" id="idtk" name="idtk" required>
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="tentk" class="form-label">Tên Tài Khoản:</label>
                        <input type="text" class="form-control form-control-sm" style="width: 500px;" id="tentk" name="tentk" required>
                    </div>
                    <div class="mb-3">
                        <label for="diachiuser" class="form-label">Địa Chỉ:</label>
                        <input type="text" class="form-control" style="width: 500px;" id="diachiuser" name="diachiuser" value="">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Thêm TK</button>
                </form>
            </div>

        </div>
    </div>
    <!-- End of Page Wrapper -->
    @include('ql.pages.end');
    @else
    <h1>Ban khong co quyen truy cap</h1>
    @endif
    @endforeach
    @else
    <h1>Chua dang nhap</h1>
    <div><a href="/login">Dang nhap ngay</a></div>
    @endif
</body>

</html>
