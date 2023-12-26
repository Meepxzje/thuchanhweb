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
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Danh Sách Sản Phẩm</h1>
            </div>
            <div class="container">
                <table class="table" border="1">
                    <thead>
                        <tr>
                            <th>ID Sản Phẩm</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá</th>
                            <th>Mô Tả</th>
                            <th>Nhà Cung Cấp</th>
                            <th>Loại Sản Phẩm</th>
                            <th>Nhà Sản Xuất</th>
                            <th>Hình Ảnh</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($SanPham as $sp)
                        <tr>
                            <td>{{ $sp->IDSP }}</td>
                            <td>{{ $sp->TenSP }}</td>
                            <td>{{ $sp->Gia }}</td>
                            <td class="text-truncate" style="max-width: 250px;">{{ $sp->MoTa }}</td>
                            <td>{{ $sp->TenNCC }}</td>
                            <td>{{ $sp->TenLSP }}</td>
                            <td>{{ $sp->TenNSX }}</td>
                            <td>
                                @foreach([$sp->imgSP, $sp->imgSP1, $sp->imgSP2] as $image)
                                <img src="img/sp/{{ $image }}" style="max-width: 50px; max-height: 50px;" alt="Ảnh">
                                @endforeach
                            </td>
                            <td>
                                <!-- Nút Sửa -->
                                <a href="{{ route('sp.suasp', ['id' => $sp->IDSP]) }}" class="btn btn-warning">Sửa</a>
                                <a href="{{ route('sp.xoasp', ['id' => $sp->IDSP]) }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--end content-->
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
