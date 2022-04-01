<?php
if(isset($_FILES['image'])){
$file_name = $_FILES['image']['name'];
$file_tmp =$_FILES['image']['tmp_name'];
move_uploaded_file($file_tmp,"images/".$file_name);

echo "<center><h1>Image Upload Success</h1></center>";
echo '<p ><img src="images/'.$file_name.'" style="width:100%" ></p>';

shell_exec('"C:\\Program Files (x86)\\Tesseract-OCR\\tesseract" "C:\\xampp\\htdocs\\miniprojecAI\\images\\'.$file_name.'" out');

echo "<br><center><h1>OCR after reading</h1></center><br><pre>";


$myfile = fopen("out.txt", "r") or die("Unable to open file!");
// echo fread($myfile,filesize("out.txt"));
fclose($myfile);
echo "</pre>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Text cleansing</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- <style>
        .body {
            font-family: 'Kanit', sans- serif;
        }
    </style> -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon1.png" rel="apple-touch-icon">

</head>

<body class="body">
    
    <center>
        <div class="container">

            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <div class="form-group ">

                        <textarea id="input_area" name="message" rows="10" cols="110"><?php 
                $myfile = fopen("out.txt", "r") or die("Unable to open file!");
                echo fread($myfile,filesize("out.txt")); ?></textarea>
                        <br>
                        <button onclick="submit_thai2en()" type="summit"
                            class="btn btn-primary">แปลเป็นภาษาอังกฤษ</button>

                        <button onclick="submit_en2thai()" type="summit"
                            class="btn btn-warning">แปลเป็นภาษาไทย</button>

                        <br />
                        <textarea id="translated_area" name="message" rows="10" cols="110"></textarea>

                    </div>

                </div>
                <button onclick="location.href = 'index.php';" class="btn btn-success" >Home</button>
            </div>
        </div>
    </center>
    <br>

</body>

<script src="EngThai.js"></script>

</html>