<?php
    session_start();
    require '../db.php';


        echo "<pre>";
    print_r($_SESSION);



    //print_r($_POST[]  );



    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = dataFilter($_POST['name']);
        $mobile = dataFilter($_POST['mobile']);
        $user = dataFilter($_POST['uname']);
        $email = dataFilter($_POST['email']);
      
        // $post = dataFilter($_POST['post']);
        // $year = dataFilter($_POST['year']);
        // $edu = dataFilter($_POST['edu']);


        // $_SESSION['Post'] = $post;
        // $_SESSION['Edu'] = $edu;
        // $_SESSION['Year'] = $year;
    }
    $id = $_SESSION['id'];

    // $sql = "UPDATE members SET Name='$name',Username='$user',MobileNo='$mobile',Email='$email',Year='$year',Section='$section',Edu='$edu',Post='$post' WHERE id='$id';";
    $sql = "UPDATE farmer SET fname='$name',fusername='$user',fmobile='$mobile',femail='$email' WHERE fid='$id' ";

    $result = mysqli_query($conn, $sql);
    if($result)
    {
        $_SESSION['message'] = "Profile Updated successfully !!!";
        $_SESSION['Email'] = $email;
        $_SESSION['Name'] = $name;
        $_SESSION['Username'] = $user;
        $_SESSION['MobileNo'] = $mobile;


        header("Location: ../profileView.php");
    }
    else
    {
        $_SESSION['message'] = "There was an error in updating your profile! Please Try again!";
        header("Location: ../Login/error.php");
    }

function dataFilter($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>
