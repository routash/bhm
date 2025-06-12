<?php
session_start();


include('./includes/config.php');
include('./template/ahkweb/authentication-signin.php');
if(isset($_POST['username']) && !empty($_POST['username'])){
    $username = mysqli_real_escape_string($ahk_conn,$_POST['username']);
    $password = mysqli_real_escape_string($ahk_conn,$_POST['password']);
    $fetch = mysqli_query($ahk_conn,"SELECT * FROM users WHERE phone='$username' or email='$username'");
    if(mysqli_num_rows($fetch)==1){
        $data = mysqli_fetch_assoc($fetch);
        if($data['status'] ==1){
            if(password_verify($password,$data['password'])){
                if(!isset($_SESSION)){
                    session_start();
                }
                $_SESSION['phone'] = $data['phone'];
                
                ?>
                <script>
                    $(function(){
                        Swal.fire(
                            'Success',
                            'Login Success',
                            'success'
                        )
                    })
                    setTimeout(() => {
                        window.location.href='admin';
                    }, 1500);
                </script>
                <?php
            }else{
                ?>
                <script>
                    $(function(){
                        Swal.fire(
                            'Incorrect Password',
                            'Please Enter Valid Password!',
                            'error'
                        )
                    })
                </script>
                <?php
            }
        }else{
            ?>
        <script>
            $(function(){
                Swal.fire(
                    'Opps',
                    'Your Account Is Not Active, Contact With  Team!',
                    'error'
                )
            })
        </script>
        <?php
        }
    }else{
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Opps',
                    'Email or Phone Is Not Registered !',
                    'error'
                )
            })
        </script>
        <?php
    }
}
?>