<?php
$fullcalendar_path = "fullcalendar-4.4.2/packages/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://fonts.google.com/specimen/Anton">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link href='<?=$fullcalendar_path?>/core/main.css' rel='stylesheet' />
    <link href='<?=$fullcalendar_path?>/daygrid/main.css' rel='stylesheet' />
 
    <script src='<?=$fullcalendar_path?>/core/main.js'></script>
    <script src='<?=$fullcalendar_path?>/daygrid/main.js'></script>
    <title>Innovation</title>
    <style>
        .name {
            width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .detail {
            width: 350px;
            height: 50px;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .image_item {
            width: 200px;
            margin: auto;
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
                <a class="nav-link" href="main_user" href="">กลับ</a> 
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
            <h3 align="center">สมัครสำเร็จ</h3> 
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
        <br><h3 align="center">บริการห้อง</h3>
        <div class="row">
       
            <div class="col">
                <center>
                <div class="col">
                        <div class="card-body">
                        <div class="row">

                        
                            <div class="col-6">
                            <a href="room_user_his{{ session('user_id') }}"  class="btn btn-primary">
                                <h1>บันทึกการจองห้อง</h1>
                            </a>
                            </div>
                             
                            <div class="col-6">
                                <a href="serviceroom" class="btn btn-success">
                                <h1>บริการจองห้อง</h1>
                                </a>
                            </div>
                            
                        </div>
                    </div>
                </center>
            </div>
        </div>
    </div>
    
     <!-- calenda -->
     <input type="hidden" name="user_id" value="{{ session('user_id') }}">
   
    <!-- calenda -->
        <center>
            <br><h3>รายการห้องจอง</h3><br>
            <table class="table" id="mytable">
                <thead>
                    <tr>
                    <th><h5 align="center">ลำดับ</h5></th>
                    <th><h5 align="center">ชื่อห้อง</h5></th>
                    <th><h5 align="center">วันที่เริ่มจอง</h5></th>
                    <th><h5 align="center">วันที่สิ้นสุด</h5></th>
                    <th><h5 align="center">การใช้ห้อง</h5></th>
                    <th><h5 align="center">ผู้จอง</h5></th>
                    <th></th>
                    
                    </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                    @foreach ($data_room as $data_room) 
                    <tr>
                    <td><h5 align="center"><?php echo $i ?></h5></td>
                    <td><h5 class="name">{{ $data_room->room_name }}</h5></td>
                    <td><h5 align="center">{{ $data_room->date_startR }}</h5></td>
                    <td><h5 align="center">{{ $data_room->date_endR }}</h5></td>
                    <td><h5 align="center">{{ $data_room-> room_event }}</h5></td>
                    <td>
                        <h5 align="center">{{ $data_room->username }}</h5>
                    </td>
                    <td>
                    <a  href="cancel_room{{$data_room-> room_id}}/{{$user_id}}" class="btn btn-primary">ยกเลิกการจอง</a>
                    </td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                  
                </tbody>
            </table>
        </center>
    <!-- body -->
    <script>
        function myFunction() {
            var x = document.getElementById("myDIV");
            if (x.style.display === "none") {
                x.style.display = "block";
            }else {
                x.style.display = "none";
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>