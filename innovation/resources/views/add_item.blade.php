<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://fonts.google.com/specimen/Anton">
    <title>Innovation</title>
    <style>
        textarea{ 
            width: 700px; 
            min-width:700px; 
            max-width:700px; 

            height:400px; 
            min-height:400px;  
            max-height:400px;
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="navbar-brand my-auto " href="home"><h1>INOVATION PARK</h1></a>
            </li>
        </ul>
        <ul class="nav navbar-nav flex-row justify-content-md-center justify-content-start flex-nowrap">
            <li class="nav-item">
                <a class="nav-link" href="item" href="">กลับ</a> 
            </li>
            <li class="nav-item">
                <a class="nav-link" >{{ session('user_name') }}</a> 
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout">ออกจากระบบ</a> 
            </li>
        </ul>
    </nav>
    <!-- navbar -->
    <!-- alert -->
    @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <h4 align="center">ข้อมูลไม่ครบถ้วน</h4> 
            @foreach ($errors->all() as $error)
                <h5 align="center">{{ $error }}</h5>
            @endforeach
        </div>
    @endif
    @if (session('status')==1)
        <div class="alert alert-success" role="alert">
            <h3 align="center">เพิ่มอุปกรณ์สำเร็จ</h3> 
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
    <div class="container">
        <center>
            <br><h3>เพิ่มอุปกรณ์</h3><br>
            <form action="add_item_db" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
                <input type="hidden" name="admin_id" value="{{ session('user_id') }}">
                <input name="name" type="text" placeholder="ชื่ออุปกรณ์" require><br><br>
                <input name="serial_number" type="text" placeholder="รหัสอุปกรณ์" require><br><br>
                <input name="video" type="text" placeholder="ลิ้งค์วิดีโอแนะนำอุปกรณ์" require><br><br>
                <textarea name="detail" cols="50" rows="5" placeholder="คำบรรยาย"></textarea><br><br>
                <p>เพิ่มรูปภาพ</p>
                <input type="file" name="image" require><br><br>
                <button type="submit" class="btn btn-primary">เพิ่ม</button>
            </form>
        </center>
    </div>
    <!-- body -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>