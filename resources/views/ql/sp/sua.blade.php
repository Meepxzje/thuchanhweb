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
                <h1 class="h3 mb-0 text-gray-800">Sửa Sản Phẩm</h1>

            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('sp.update', ['id' => $sp->IDSP]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="ma-sp" class="form-label">ID Sản Phẩm:</label>
                            <input type="text" class="form-control form-control-sm" style="width: 500px;" id="idsp" name="idsp" value="{{$sp->IDSP}}" required readonly>
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="tensp" class="form-label">Tên Sản Phẩm:</label>
                        <input type="text" class="form-control form-control-sm" style="width: 500px;" id="tensp" name="tensp" value="{{$sp->TenSP}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="tensp" class="form-label">Giá:</label>
                        <input type="text" class="form-control form-control-sm" style="width: 500px;" id="gia" name="gia" value="{{$sp->Gia}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="tensp" class="form-label">Mô Tả:</label>
                        <input type="text" class="form-control form-control-sm" style="width: 500px;" id="mota" name="mota" value="{{$sp->MoTa}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="loaisanpham" class="form-label">Loại Sản Phẩm:</label>
                        <select name="lsp" class="form-control form-control-sm" style="width: 500px;">
                            @foreach($lsp as $lsp)
                            <option value="{{ $lsp->IDLSP }}">{{ $lsp->TenLSP }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nhasanxuat" class="form-label">Nhà Sản Xuất:</label>
                        <select name="nsx" class="form-control form-control-sm" style="width: 500px;">
                            @foreach($nsx as $nsx)
                            <option value="{{ $nsx->IDNSX }}">{{ $nsx->TenNSX }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nhacungcap" class="form-label">Nhà Cung Cấp:</label>
                        <select name="ncc" class="form-control form-control-sm" style="width: 500px;">
                            @foreach($ncc as $ncc)
                            <option value="{{ $ncc->IDNCC }}">{{ $ncc->TenNCC }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="hinhanh" class="form-label">Hình ảnh 1:</label>
                        <br>
                        <input type="file" id="imgsp" name="imgsp">
                    </div>
                    <div class="mb-3">
                        <label for="hinhanh" class="form-label">Hình ảnh 2:</label>
                        <br>
                        <input type="file" id="imgsp1" name="imgsp1">
                    </div>
                    <div class="mb-3">
                        <label for="hinhanh" class="form-label">Hình ảnh 3:</label>
                        <br>
                        <input type="file" id="imgsp2" name="imgsp2">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Cập Nhật</button>
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
