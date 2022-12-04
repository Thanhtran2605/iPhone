<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Táo Đỏ</title>
    <link rel="icon" href="img/taodopng.jpg" type="image/png">

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet'
          type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="tabs.css">
    <link rel="stylesheet" href="login.css">
    <!--    <link rel="stylesheet" href="css/owl.carousel.css">-->
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="resarrowpro.css">
    <link rel="stylesheet" href="contact.css">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body>

<!--Link: https://business.facebook.com/latest/inbox/settings/chat_plugin?asset_id=108373085410955&nav_ref=profile_plus_profile_left_nav_button-->
<!--**************** TÍCH HỢP CHÁT PLUGIN TỪ FACEBOOK *********-->

<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "108373085410955");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v15.0'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!--**************** TÍCH HỢP CHÁT PLUGIN TỪ FACEBOOK *********-->

<!--    JQUERY CDN FOR TRÌNH SOẠN THẢO-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('noidung');
</script>

<?php
session_start();

require_once("admincp/config/config.php");
require_once("admincp/config/database.php");

include("pages/header.php");
include("pages/main.php");
include("pages/footer.php");
?>

<!-- Latest jQuery form server -->
<script src="https://code.jquery.com/jquery.min.js"></script>

<!-- Bootstrap JS form CDN -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- jQuery sticky menu -->
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.sticky.js"></script>

<!-- jQuery easing -->
<script src="js/jquery.easing.1.3.min.js"></script>

<!-- Main Script -->
<script src="js/main.js"></script>

<!-- Slider -->
<script type="text/javascript" src="js/bxslider.min.js"></script>
<script type="text/javascript" src="js/script.slider.js"></script>


<!--Font  Icon Awesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

<!--SCRIPT TẠO TABS CỦA SIMPLE JQUERY TABS COPY CSS VỚI HTML BÊN SANPHAM.PHP-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
    // Show the first tab and hide the rest
    $('#tabs-nav li:first-child').addClass('active');
    $('.tab-content').hide();
    $('.tab-content:first').show();

    // Click function
    $('#tabs-nav li').click(function () {
        $('#tabs-nav li').removeClass('active');
        $(this).addClass('active');
        $('.tab-content').hide();

        var activeTab = $(this).find('a').attr('href');
        $(activeTab).fadeIn();
        return false;
    });
</script>

<!--<script>-->
<!---->
<!--    $('ul').on("click", "a", function () {-->
<!--        var hrf = $(this).attr("href");-->
<!--        var lin = hrf.substring(1, hrf.length);-->
<!--        $(".list-page").hide();-->
<!--        $(".list-page").load(lin)-->
<!--        $(".list-page").show();-->
<!--    });-->
<!---->
<!---->
<!--</script>-->

<!--=-->
<!--SCRIPT TẠO TABS CỦA SIMPLE JQUERY TABS COPY CSS VỚI HTML BÊN SANPHAM.PHP-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->

<!--<script>-->
<!--    $("header").on("click", "a", function () {-->
<!--        var hrf = $(this).attr("href");-->
<!--        var lin = hrf.substring(1, hrf.length);-->
<!--        $("#content").load(lin);-->
<!--    })-->
<!--</script>-->

</body>
</html>