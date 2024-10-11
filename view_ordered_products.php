<?php

require 'db.php';

session_start();


//echo "<pre>";
// print_r($_SESSION);

$ord_id = $_SESSION["id"];

// $sql = "SELECT * FROM transaction WHERE bid = '$ord_id'";

// print_r($sql);

// $result = mysqli_query($conn, $sql);


// while($row = mysqli_fetch_assoc($result)){

//     print_r($row);


//     print_r($row['pid']);

//     // $sql = "SELECT * FROM transaction WHERE bid = '$ord_id'";

//     // print_r($sql);

//     // $result = mysqli_query($conn, $sql);



// }

// echo "\n";


//     $sql = "SELECT * FROM fproduct WHERE pid = '31' ";

//     print_r($sql);

//     $result = mysqli_query($conn, $sql);

//     while($row = mysqli_fetch_assoc($result)){

//         print_r($row);
//     }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AgroCulture</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap\js\bootstrap.min.js"></script>
    <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="login.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-xlarge.css" />
    </noscript>
    <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
</head>

<body class>

    <?php
    require 'menu.php';
    function dataFilter($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <!-- One -->
    <section id="main" class="wrapper style1 align-center">
        <div class="container">
            <h2>Your Orders</h2>


            <div class="row">



                <section>








                    <?php
                    //echo "<pre>";

                    $sql = "SELECT * FROM transaction WHERE bid = '$ord_id'";

                    # print_r($sql);

                    $result = mysqli_query($conn, $sql);


                    while ($row = mysqli_fetch_assoc($result)) {

                        // print_r($row);

                        echo "<div class='col-md-6'>";

                        //print_r($row['pid']);

                        $product_full_details = $row['pid'];

                        $sql_for_pdt_details = "SELECT * FROM fproduct WHERE pid = '$product_full_details' ";

                        //print_r($sql);

                        $result_sql_for_pdt_details = mysqli_query($conn, $sql_for_pdt_details);

                        while ($row_result_sql_for_pdt_details = mysqli_fetch_assoc($result_sql_for_pdt_details)) {

                            // print_r($row_result_sql_for_pdt_details);



                            $p_name = $row_result_sql_for_pdt_details['product'];

                            $p_image = $row_result_sql_for_pdt_details['pimage'];

                            $p_category = $row_result_sql_for_pdt_details['pcat'];

                            $p_price = $row_result_sql_for_pdt_details['price'];


                            echo "            <strong>
                                    <h2 class='title' style='color:black; '>$p_name</h2>
                                   </strong>
                                   
                                <a href='review.php?pid=$product_full_details'> <img class='image fit' src='images/productImages/$p_image' height='220px;' /></a>

                                
                                    <div style='align: left'>
                                        <blockquote>Type : $p_category <br> Price : $p_price /-<br></blockquote></div> </div>

                                            
                                   ";
                        }
                    }

                    ?>


                </section>

            </div>


        </div>


        </div>

    </section>
    </header>

    </section>

</body>

</html>