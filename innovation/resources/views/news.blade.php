<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://fonts.google.com/specimen/Anton">
    <title>Innovation</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="navbar-brand my-auto " href="home">
                    <h1>INOVATION PARK</h1>
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav flex-row justify-content-md-center justify-content-start flex-nowrap">
            <li class="nav-item">
                <a class="nav-link" href="main_user" href="">กลับ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">{{ session('user_name') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout">ออกจากระบบ</a>
            </li>
        </ul>
    </nav>
    <!-- navbar -->
    <!-- alert -->
    @if (session('status')==1)
    <div class="alert alert-success" role="alert">
        <h3 align="center">เพิ่มข่าวสำเร็จ</h3>
    </div>
    @elseif(session('status')==2)
    <div class="alert alert-danger" role="alert">
        <h3 align="center">เกิดข้อผิดพลาด</h3>
    </div>
    @elseif(session('status')==3)
    <div class="alert alert-danger" role="alert">
        <h3 align="center">รหัสผ่านไม่ตรงกัน</h3>
    </div>
    @elseif(session('status')==4)
    <div class="alert alert-danger" role="alert">
        <h3 align="center">มีชื่อผู้ใช้นี้อยู่แล้ว</h3>
    </div>
    @elseif(session('status')==5)
    <div class="alert alert-danger" role="alert">
        <h3 align="center">รหัสผ่านไม่ถูกต้อง</h3>
    </div>
    @elseif(session('status')==6)
    <div class="alert alert-danger" role="alert">
        <h3 align="center">ไม่มีชื่อผู้ใช้นี้</h3>
    </div>
    @endif
    <!-- alert -->
    <!-- body -->
    <div>
        <center>
            <div class="container">
                <form action="add_news" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <br>
                    <input type="hidden" name="admin_id" value="{{session('user_id')}}">
                    <h3>ชื่อข่าว</h3><br>
                    <input name="news_name" style="width:50%;" class="form-control" type="text"><br>
                    <h3>รูปข่าว</h3><br>
                    <input type="file" name="file"><br><br>
                    <button class="btn btn-primary" type="submit">เพิ่มข่าว</button>
                </form>
            </div>
            <br>
            <h3>รายการข่าว</h3><br>
            <table class="table" id="mytable">
                <thead>
                    <tr>
                        <th>
                            <h5 align="center">ลำดับ</h5>
                        </th>
                        <th>
                            <h5 align="center">ชื่อข่าว</h5>
                        </th>
                        <th>
                            <h5 align="center">วันที่เพิ่ม</h5>
                        </th>
                        <th>
                            <h5 align="center">คนเพิ่ม</h5>
                        </th>
                        <th>
                            <h5 align="center">รูป</h5>
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach ($data_news as $data_news)
                    <tr>
                        <td>
                            <h5 align="center"><?php echo $i ?></h5>
                        </td>
                        <td>
                            <h5 align="center">{{ $data_news->news_name }}</h5>
                        </td>
                        <td>
                            <h5 align="center">{{ $data_news-> date_time }}</h5>
                        </td>
                        <td>
                            <h5 align="center">{{ $data_news-> admin_first_name }}</h5>
                        </td>
                        <td>
                            <h5 align="center"><a href="news_img{{$data_news->news_id}}"  class="btn btn-primary" target="_blank">ดู</a></h5>
                        </td>
                        <td>
                            <form action="delete_news" method="post">
                                {!! csrf_field() !!}
                                <input type="hidden" name="news_id" value="{{$data_news->news_id}}">
                                <input type="hidden" name="filename" value="{{$data_news->news_img}}">
                                <button class="btn btn-danger" type="submit" align="center">ลบข่าว</button>
                            </form>
                            
                        </td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
        </center><br>
    </div>
    <!-- body -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
</body>

</html>