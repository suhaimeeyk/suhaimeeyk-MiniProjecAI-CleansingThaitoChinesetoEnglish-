<?php
error_reporting(0);
$va = $_GET['check'];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.aiforthai.in.th/th-zh-nmt/" . urlencode($va),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "Apikey: cTAfAvbmoBdzmEYTUAco602cw4v0FMkq" // key man
    )
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    // echo $response;
    global $cnTrans;
    $cnTrans = $response;
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
    <!-- ======= Header ======= -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center justify-content-center">
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
                <div class="col-xl-6 col-lg-8">
                    <!-- <a class="img-fluid"><img src="assets/img/apple-touch-icon1.png"></a> -->
                    <p>
                    <div>
                        <h1>CleansingThai<br>ChinesetoEnglish<span>.</span></h1>
                    </div>
                    <h2>Welcome to Website</h2>
                </div>
            </div>

            <div class="row mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
                <div class="col-xl-2 col-md-4 col-6 ">
                    <div class="icon-box">
                        <!-- <nav class="nav-menu d-none d-lg-block"> -->
                        <i class="ri-bar-chart-box-line"></i>
                        <h3><a href="#services">GET STARTED</a></h3>
                        <!-- </nav> -->
                    </div>
                </div>
                <!-- <div class="col-xl-2 col-md-4 col-6 mt-4 mt-md-0">
                    <div class="icon-box">
                        <i class="ri-calendar-todo-line"></i>
                        <h3><a href="#services">MY STADY</a></h3>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-6 mt-4 mt-xl-0">
                    <div class="icon-box">
                        <i class="ri-database-2-line"></i>
                        <h3><a href="#portfolio">MY SKILL</a></h3>
                    </div>
                </div> -->
            </div>

        </div>
    </section><!-- End Hero -->

    <br>

    <center>
        <h1>Detect text in images</h1>
        <br>
        <div  class="container">
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <!-- <input type="file" name="image" /> -->
                <input class="form-control" type="file" name="image">
                <br>
                <button type="submit" class="btn btn-info">ประมวลผล</button>
            </form>
        </div>
    </center>

    <div id="services">
        <form action="apitextclensing.php" method="get">

            <div class="container" style="margin-top:30px">

                <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="form-group">

                            <label for=" first"> ต้นฉบับ :</label>
                            <input type="text" class="form-control" name="first" id="first" size="25" maxlength="1000">
                        </div>


                        <div class="form-group ">
                            <button type="summit" name="test" id="test" class="btn btn-success">ประมวลผล</button>
                        </div>

                        <div class="form-group ">
                            <label for="last">ผลลัพธ์ภาษาไทย : </label>
                            <input class="form-control" name="last" size="50" value="<?php echo $va; ?>">
                        </div>

                        <div class="form-group ">
                            <label for="last2">ภาษาจีน : </label>
                            <input class="form-control" id="last2" name="last2" size="50" value="<?php
                                                                                                    if ($va == '') {
                                                                                                        echo "";
                                                                                                    } else {
                                                                                                        echo $cnTrans;
                                                                                                    }
                                                                                                    ?>">
                        </div>

                        <!-- <button type="summit" name="test" id="test" class="btn btn-success">ประมวลผล</button> -->

                    </div>
                </div>
            </div>
    </div>

    </form>

    <div class="container" style="margin-top:30px">

        <div class="card shadow-lg p-3 mb-5 bg-white rounded">
            <div class="card-body">
                <div class="form-group ">

                    <textarea id="input_area" name="message" rows="5" cols="110"><?php echo $va; ?></textarea>
                    <br>
                    <button onclick="submit_thai2en()" type="summit"
                        class="btn btn-primary">แปลเป็นภาษาอังกฤษ</button>

                    <button onclick="submit_en2thai()" type="summit"
                        class="btn btn-warning">แปลเป็นภาษาไทย</button>

                    <br />
                    <textarea id="translated_area" name="message" rows="5" cols="110"></textarea>

                </div>

            </div>
        </div>
    </div>


</body>

<script src="EngThai.js"></script>

</html>