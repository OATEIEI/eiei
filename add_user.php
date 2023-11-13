<?php
include_once "navbar.php";
if(isset($_POST['submit'])){
    include_once 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];

    if($username == '' || $password =='' || $fullname == '' || $email == ''){
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบทุกข้อ');history.back();</script>";
    }else{
    $num = mysqli_fetch_array($con->query("SELECT username  FROM user WHERE username='$username'"));
    if($num == 1){
        echo "<script>alert('usernameมีอยู่เเล้วเปลี่ยนซะ')</script>";
    }else{
    $sql = "INSERT INTO user VALUES('$username','$password','$fullname','$email')";
    $result = $con->query($sql);
    if(!$result){
        echo "<script>alert('Error:ไม่สามารถเพิ่มข้อมูลได้');history.back();</script>";
    }else{
        header('location:user.php');
    }
  }//เช็ค username ซ้ำ
 }//เช็คค่าว่าง
}//if_isset เช็คการกดปุ่ม
?>



<div class="container w-50 mt-3">
    <div class="card">
        <div class="card-header bg-danger text-white mb-3">
            เพิ่มข้อมูล user
        </div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']?>"method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" >
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Fullname</label>
                <input type="text" name="fullname" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">บันทึกข้อมูล</button>
        </form>
        </div>
    </div>
</div>