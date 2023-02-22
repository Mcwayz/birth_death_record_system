<?php

class auth
{
  // function that logs a users into their accounts according to their role

 public function login($user_email, $user_pass)
 {
    $db = new DBconnection();
    $dbConn = $db->getConnection();
    $sql = "SELECT * FROM `users_tbl` WHERE `user_email` = '$user_email' AND `user_password` = '$user_pass' LIMIT 1";
    $query = $dbConn->query($sql);
    if ($query->rowCount() > 0)
     {
          $result = $query->fetch(PDO::FETCH_ASSOC);
          $_SESSION['user'] = $result['user_id'];
          $_SESSION['name'] = $result['fullname'];
          $_SESSION['email'] = $result['user_email'];
          $_SESSION['role'] = $result['user_role'];
          $role = $_SESSION['role'];
          if($role == 'admin')
               {
                  echo "<script>alert('Login Successful');</script>";
                  echo"<script>window.location.href = 'admin/index.php'</script>";
               }
              elseif ($role == 'user')
               {
                echo "<script>alert('Login Successful');</script>";
                echo"<script>window.location.href = 'user/index.php'</script>";
               }
               else
               {
                echo "<script>alert('User Not Found');</script>";
               }
      }
      else
      {
        $_SESSION['attempt'] += 1;
        echo "<script>alert('Wrong Login Details');</script>";
        //set the time to allow login if third attempt is reach
        if($_SESSION['attempt'] == 3)
          {
            $_SESSION['attempt_again'] = time() + (2*60);
            $Limit = $_SESSION['attempt_again'];
            //note 2*60 = 2mins, 60*60 = 1hr
            echo "<script>alert('Max Attempts Reached Try Again in'+$Limit);</script>";
            echo"<script>window.location.href = 'user/logout.php'</script>";
          }
      }
  }
  
}
?>