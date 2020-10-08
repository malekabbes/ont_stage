<?php
require_once("db.php");
if(isset($_POST["log"])) {
$logmail=$_POST['email'];
$logpass=$_POST['password'];
$select="SELECT * FROM utilisateurs WHERE email='$logmail'";
$result=mysqli_query($mysqli,$select);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

$pwverif=password_verify($logpass,$row['password']);
	if((mysqli_num_rows($result) == 1) AND ($pwverif==true) AND (isset($pwverif))) {
       $_SESSION['myid']= $row['ID'];
		   $_SESSION['access'] = "oui";
        $_SESSION['email']   = $_POST['email'];
        $_SESSION['username']   = $row['username'];
        $_SESSION['phone']   = $row['phone'];
        $_SESSION['usertype'] = $row['usertype'];
        $_SESSION['departement'] = $row['departement'];
        $_SESSION['loggedin'] = TRUE;
        if ($row['usertype']=="ADMIN"){
        echo   "<script>
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Bonjour Directeur de Departement ".$row['departement']."',
          showConfirmButton: false,
          timer: 3500
        })
       .then(function(){
                    window.location.href = 'ont_admin/interface.php';
                })
                </script>
                   ";
            }
            elseif (!($row['usertype']=="ADMIN")){
              echo   "<script>
              Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Bonjour employé de de Departement ".$row['departement']."',
                showConfirmButton: false,
                timer: 2500
              })
               .then(function(){
                          window.location.href = 'utilisateur/monespace.php';
                      })
                      </script>
                         ";
            }
        } else {
            $_SESSION['access'] = "non";
            echo   "<script>
            Swal.fire({
              position: 'top-end',
              icon: 'error',
              title: 'Vérifiez Vos informations !',
              showConfirmButton: false,
              timer: 2500
            })
                       </script>";
        }
      }
  
    

// if (empty($logmail) || empty($logpass)){
//     header("location: ../index.php?erreur=emptyfields");
//     exit();
// }
// else {
//     $sql = "SELECT * utilisateurs WHERE email='$logmail' and password='$logpass'";
//     $stmt= mysqli_stmt_init($mysqli);
//     if(!mysqli_stmt_prepare($stmt,$mysqli)){
//         header("Location: ../index.php?error=sqlerror");
//         exit();
//     }
//     else{
//         mysqli_stmt_bind_param($stmt,"ss",$logmail,$logpass);
//         mysqli_stmt_execute($stmt);
//         $result=mysqli_stmt_get_result($stmt);
//         if($row=mysqli_fetch_assoc($result)){
//          $pwdCheck=password_verify($logpass,$row['password']);
//          if ($pwdCheck == false){
//              header("Location: ../index.php?error=wrongpwd");
//              exit();
//          }
//          else if($pwdCheck == true){
//           session_start();
//           $_SESSION['userID']=$row['id'];
//           $_SESSION['User mail']=$row['email'];
//           header("Location: ../index.php?login=success");
//           exit();
//          }
//     }
//     else{
//         header("Location : ../index.php?error=nouser");
//         exit();
//     }

// }
// }
// }
?>

