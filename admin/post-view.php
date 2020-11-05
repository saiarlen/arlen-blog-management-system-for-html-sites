<!DOCTYPE html>
<html lang="en">
<?php
require_once("inc/config.php");
require_once("inc/post-handle.php");

// Check user login or not
if (!isset($_SESSION["arlenUserTest"])) {
    header('Location: ../blog-admin.php');
}


$pos_id = $_GET["id"];
$pos_update_sql = "SELECT * FROM ar_posts WHERE post_id=" . $pos_id . " LIMIT 1";
$posupdate_result = mysqli_query($conn, $pos_update_sql);

if (mysqli_num_rows($posupdate_result) == 1) {
    // output data of each row
    while ($pos_update_row = mysqli_fetch_assoc($posupdate_result)) {

        $pos_update_id = $pos_update_row['post_id'];
        $pos_update_title =  $pos_update_row['post_title'];
        $pos_update_cats = $pos_update_row['post_category'];
        $pos_update_date =  $pos_update_row['post_date'];
        $pos_update_content = $pos_update_row['post_content'];
        $pos_update_img = $pos_update_row['post_img'];
        $pos_update_alt =  $pos_update_row['post_imgalt'];
        $pos_update_author =  $pos_update_row['post_author'];
    }

    //Changing date format
    $pos_dis_date = new DateTime($pos_update_date);
    $pos_up_date = $pos_dis_date->format("d-m-Y");

    //Converting into arrays
    $ar_pos_update_cats = explode(",", $pos_update_cats);
    ?>


<head>
    <title><?php echo $pos_update_title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="deps/img/fav.png">
    <link href="deps/css/bootstrap.css" rel="stylesheet">
    <script src="deps/js/jquery.min.js"></script>
    <script src="deps/js/bootstrap.min.js"></script>

    <style>
        header h3 {
            padding-top: 10px;
        }

        header {
            width: 100%;
            height: 50px;
            background-color: #141619;
            color: #fff;
            text-align: center;
            margin-bottom: 50px;
        }

        footer h6 {
            padding-top: 6px;
            margin-bottom: 0;
        }

        footer {
            width: 100%;
            height: 30px;
            background-color: #141619;
            color: #fff;
            text-align: center;
            margin-top: 50px;
        }


        .container {
            max-width: 100%;
        }

        .wrap {
            max-width: 1000px;
        }

        .wrap h5 {
            font-weight: bold;
            color: #222;
        }

        .wrap h5 span.label {
            color: #fff;
            background: #27a7e1;
            padding: 1px 8px;
            border-radius: 8px;

        }

        .ps-content {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <header class="container">
        <h3><?php echo $pos_update_title; ?></h4>
    </header>

    <div class="container wrap">
        <div class="row">
            <div class="col-sm-12">
                <img class="img-fluid" src="<?php echo $pos_update_img; ?>" alt="Blog">
                <hr>
                <h2><?php echo $pos_update_title; ?></h2>
                <h5><span class="glyphicon glyphicon-time"></span> Post by <?php echo $pos_update_author ?>,
                    <?php echo $pos_up_date; ?>.</h5>
                <h5>Categories:
                    <?php
                    $cat_query = "SELECT * FROM ar_categories ORDER BY cat_id DESC";
                    $cat_final_all_data = mysqli_query($conn, $cat_query);
                    if (mysqli_num_rows($cat_final_all_data) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($cat_final_all_data)) {

                    ?>
                            <span class="label"> <?php echo $row["cat_name"]; ?></span>
                    <?php
                        }
                    }
                    ?>
                </h5>
                <div class="ps-content">
                    <?php echo $pos_update_content; ?>
                </div>

            </div>
        </div>
    </div>

    <footer class="container">
        <h6>Copyright 2020</h6>
    </footer>

</body>

<?php 
} else {

    echo  '<script>window.alert("Something went wrong! Please try again.")</script>';
}



?>

</html>