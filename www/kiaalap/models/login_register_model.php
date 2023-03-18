 <?php 
@session_start();
 
$acction=null;
if(isset($_POST["acction"])){
    $acction=mysqli_real_escape_string($conn,$_POST["acction"]);
}

$full_name=null;
$tel=null;
$username=null;
$email=null;
$password=null;



switch ($acction) {
    case 'register':
        register($conn,$username,$email,$password);
        break;

    case 'login':
        login($conn,$username,$password);
        break;

    case 'forgotPassword':
        forgotPassword($conn,$username,$password);
        break;
    
    default:
        exit();
        break;
}


function register($conn,$username,$email,$password){
    
        $full_name= mysqli_real_escape_string($conn,$_POST["full_name"]); 
        $tel=mysqli_real_escape_string($conn,$_POST["tel"]); 
        $username=mysqli_real_escape_string($conn,$_POST["username"]);
        $email=mysqli_real_escape_string($conn,$_POST["email"]);
        $password=mysqli_real_escape_string($conn,$_POST["password"]);

        $md5_password = md5($password); 

     //   $sql = "INSERT INTO `tb_users` (`id`, `full_name`, `tel`, `username`, `email`, `password`,`user_role`, `profile` ) 
      //          VALUES (NULL,'$full_name', '$tel', '$username', '$email', '$md5_password', 'USER', NULL );";  

           $sql= "INSERT INTO `tb_users` (`id`, `full_name`, `tel`, `username`, `email`, `password`, `profile`, `user_role`) 
                   VALUES (NULL, '$full_name', '$tel', '$username', '$email', '$md5_password', '', 'USER');";

        if (mysqli_query($conn, $sql)) {
        // echo "New record created successfully";
        echo "<script> 
                Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'ลงทะเบียนจองคิวตัดผมเรียบร้อย',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(()=> location = './login.php')

              </script>";
        } else {
              echo
                    "<script> 
                        Swal.fire({
                            icon: 'error',
                            title: 'ลงทะเบียนจองคิวตัดผมไม่สำเร็จ', 
                            text: 'โปรดตรวจสอบความถูกต้องของข้อมูล!',
                        })
                        .then(()=> location = './register.php')
                  </script>";
                //    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
}

function login($conn,$username,$password){ 
           $username = mysqli_real_escape_string($conn, $_POST["username"]);  
           $password = mysqli_real_escape_string($conn, $_POST["password"]);  
           $password = md5($password);  
           $sql = "SELECT * FROM tb_users WHERE username = '$username' AND password = '$password'";  
           $result = mysqli_query($conn, $sql);  
           if(mysqli_num_rows($result) > 0)  
           {  
                @session_start();
                $rowUser =  mysqli_fetch_assoc($result);
                $_SESSION['username'] = $username; 
                $_SESSION['is_login'] = true; 
                $_SESSION['user_id'] = $rowUser["id"];
                $_SESSION['full_name'] = $rowUser["full_name"];   
                $_SESSION['user_role'] = $rowUser["user_role"];  
                $_SESSION['email'] = $rowUser["email"];  
                $_SESSION['profile'] = $rowUser["profile"];  
                $_SESSION['tel'] = $rowUser["tel"];  


                echo "<script> 
                        Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'เข้าสู่ระบบสำเร็จ',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(()=> location = './index.php')

                    </script>";
                
           }  
           else  
           {  
                echo
                    "<script> 
                        Swal.fire({
                            icon: 'error',
                            title: 'เข้าสู่ระบบไม่สำเร็จ', 
                            text: 'โปรดตรวจสอบความถูกต้องของข้อมูล ชื่อผู้ใช้งาน username หรือ รหัสผ่าน!',
                        }).then(()=> location = './login.php')
                  </script>";
           }  

        mysqli_close($conn);

}

function forgotPassword($conn,$username,$password){ 
        $username=mysqli_real_escape_string($conn,$_POST["username"]); 
        $sqlQuery="SELECT username FROM tb_users WHERE username='$username';";
        $resultUser = mysqli_query($conn, $sqlQuery); 
         
         if(mysqli_num_rows($resultUser) > 0)  {

        //    $password=mysqli_real_escape_string($conn,$_POST["password"]); 
        //    $md5_password = md5($password);  
        //    $sql = "UPDATE `tb_users` SET 'password'='$md5_password' WHERE `tb_users`.`username` = '$username';";  

        //     if (mysqli_query($conn, $sql)) {
        //       echo "update record successfully";
        //     } else {
        //       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        //     }

        // echo "username true";
          echo "<script>location ='../login_register.php#nk-login-switch';</script>";

         } else  
        {  
            echo '<script>alert("ไม่พบข้อมูลผู้ใช้")</script>';  
        } 
        


        mysqli_close($conn);
}