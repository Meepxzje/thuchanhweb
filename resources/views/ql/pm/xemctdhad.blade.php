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
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Danh Sách Phiếu Mua</h1>
            </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a href="/dspm">Quay lai</a>
            </div>
            <div class="container">
                <h2>Thông tin Phiếu Mua</h2>
                <p>IDPM: {{ $phieuMua->IDPM }}</p>
                <h2>Chi Tiết Đơn Hàng</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>IDSP</th>
                            <th>TênSP</th>
                            <th>Số Lượng</th>
                            <th>Đơn Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sum = 0;
                        ?>
                        @foreach($ctpm as $ct)
                        <tr>
                            <td>{{ $ct->IDSP }}</td>
                            <td>{{$ct->TenSP}}</td>
                            <td>{{ $ct->SoLuong }}</td>
                            <td><?php $fmsum = number_format($ct->DonGia, 0, ",", ".");
                                echo   $fmsum ?></td>

                            <?php
                            $tong = 0;
                            $tam =  $ct->SoLuong  * $ct->DonGia;
                            $tong += $tam;
                            $sum += $tong;
                            ?>
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h2>Tổng Tiền</h2>
                            </td>
                            <td>
                                <h2><?php $fmsum = number_format($sum, 0, ",", ".");
                                    echo   $fmsum ?></h2>
                            </td>
                        </tr>
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
