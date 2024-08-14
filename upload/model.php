<?php
session_start();
include 'include/connection.php';

if ( isset( $_SESSION['email'] ) ) 
$email= ($_SESSION['email']);
    if(empty($email)){
        $email="Email";
    }

$signin= "block";

if ( isset( $_SESSION['done'] ) ) 
$done= ($_SESSION['done']);
    if(empty($done)){
        $done="none";
        
    }else{
        $signin= "none";
    }

if ( isset( $_SESSION['final'] ) ) 
$final= ($_SESSION['final']);
    if(empty($final)){
        $final="none";
    }else{
        $signin= "none";
        $done="none";
    }


if ( isset( $_SESSION['name'] ) ) 
$name= ($_SESSION['name']);
    if(empty($name)){
        $name="none";
    }


if ( isset( $_SESSION['msg'] ) ) 
$msg= ($_SESSION['msg']);
    if(empty($msg)){
        $msg="";
        $error="none";
    }

$amount ="5000"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="This is a one time entry process for all models to join">
    <meta name="author" content="Geez">
    <meta name="robots" content="index" />
    <meta name="googlebot" content="index">
    <meta name="robots" content="max-snippet:20">
    <meta name="robots" content="max-image-preview:standard">
    <meta name="theme-color" content="#ba0737">
    <link rel="canonical" href="https://geez.fashion/login" />


    <meta property="og:url" content="https://geez.fashion/login" />
    <meta property="og:type" content="geez.fashion" />
    <meta property="og:title" content="Model Registration || Geez" />
    <meta property="og:description" content="This is a one time entry process for all models to join" />
    <meta property="og:image" content="https://geez.fashion/img/logo.png">

    <title>Model Registration || Geez</title>

    <link rel="apple-touch-icon" href="https://geez.fashion/img/logo.png">
    <link rel="icon" type="image/png" href="img/logo.png">

    <!--Template based on URL below-->
    <link rel="canonical" href="">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/style-mobile.css" rel="stylesheet" type="text/css">
    <link href="css/models.css" rel="stylesheet" type="text/css">
    <link href="css/animation/animate.css" rel="stylesheet" type="text/css">
    <link href="css/animate.css" rel="stylesheet" type="text/css">
    <link href="css/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet" type="text/css">
    <link href="css/forms.css" rel="stylesheet" type="text/css">
    <link href="css/progress.css" rel="stylesheet" type="text/css">
    <script src="https://js.paystack.co/v1/inline.js"></script>
</head>

<body>

    <div onclick="showNotice()" id="progress" class="progress">
        <div class="hold">
            <div class="loading"></div>
        </div>
    </div>


    <!-- Aside Sliders
    ================================================== -->
    <div onclick="closeMenu()" class="login">

        <aside>
            <div class="bg4 mySlides fadein"><span class="dot"></span></div>
            <div class="bg5 mySlides fadein"><span class="dot"></span></div>
            <div class="bg6 mySlides fadein"><span class="dot"></span></div>
            <div class="overlay"></div>
            <div class="container">
                <a href="home"> <img src="img/logo.png"></a>
                <p>Sign Up with your details<br>

                    Upload a portrait hair picture styled by you or your saloon.<br>

                    Add details of hair style / hair products you have used. <br>

                    share your vote link via social media handles to get votes.</p>
            </div>
        </aside>

        <div class="form-holder">

            <p class="exe-log" style="text-align: center; display: <?php echo $error ?>"><?php echo $msg ?></p>

            <form method="post" action="process/reg-models" style="display: <?php echo $signin ?>;">
                <h2>Models</h2>
                <p>If you are a model join the geez fashion modeling team for the Geez fashion African hair show and be come part of our showcase program.</p>
                <input type="text" name="Name" autocomplete="off" placeholder="Full Name" required>
                <input type="email" name="Email" placeholder="<?php echo $email ?>" required>
                <input type="text" name="Country" placeholder="Country" required>
                <input type="text" name="State" placeholder="State of Residence" required>
                <input type="tel" name="Phone" autocomplete="off" maxlength="11" placeholder="Phone" required>
                <div class="check">
                    <input type="checkbox" required>
                    <p>I agree to GEEZ <a href="terms" style="color:#ff0045">Terms And Conditions</a> </p>
                </div>
                <button type="submit" class="btn">Join Models</button>
            </form>
            
            <form id="done" method="post" action="" style="display: <?php echo $done ?>">
                <div class="form-notice">
                    <i class="fas fa-check"></i>
                    <p>Welcome!!<br> <?php echo $name ?>, to complete registration pay #5000, so you can be registered as a Geez African hair show model. to participate and win lots of prices</p>
                    <button onclick="payWithPaystack()" type="button" class="btn">Pay #5000</button>
                </div>
            </form>
            
            <form id="done" method="post" action="" style="display: <?php echo $final ?>">
                <div class="form-notice">
                    <i class="fas fa-check"></i>
                    <p>Congratulation!!<br> <?php echo $name ?>, you have been registered as a Geez African hair show model. we will get back to you shortly via your registered email <br><br><strong>( <?php echo $email ?> )</strong> </p>
                   <a href="sessionout"> <button type="button" class="btn">Thanks</button></a>
                </div>
            </form>
        </div>
        
        

        </div>
    <!-- Aside Sliders End
    //////////////////////////////////////////
    //////////////////////////////////////////
    //////////////////////////////////////////
    //////////////////////////////////////////
    //////////////////////////////////////////
    //////////////////////////////////////////
    //////////////////////////////////////////
     -->
     <!-- Footer Added
    ================================================== -->
    <div class="footer">
        <p>Copyright 2020 Nigeria Hair Show | All Rights Reserved<br> For more information: 0704834895, 08092348319</p>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="javascript/jquery-3.5.1.slim.min.js"></script>
    <script src="javascript/hero-slide.js"></script>
    <script src="javascript/img-upload.js"></script>
    <script src="javascript/menu.js"></script>
    <script src="javascript/jquery-3.6.0.min.js"></script>
    <script>
        $(window).on('load', function() {
            $(".exe-log").delay(10000);
            $(".exe-log").fadeOut(500);
        })
          
        var amount = <?php echo(json_encode($amount)); ?>;
        var emailer = <?php echo(json_encode($email)); ?>;
        
        function payWithPaystack() {
            let handler = PaystackPop.setup({
                key: 'pk_test_86e186d9f5c4cf340061cd1a7eea52fb2e8ea4f2', // Replace with your public key
                email: emailer,
                amount: amount * 100,
                currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
                ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                // label: "Optional string that replaces customer email"
                onClose: function() {
                    alert('You are canceling this transaction.');
                    window.location.href = "model";
                },
                callback: function(response) {
                    let message = 'Payment complete! Reference: ' + response.reference;
                    const referenced = response.reference;
                    alert(message);
                    window.location.href = "process/update_model?transactionhash="+referenced;
                }
            });
            handler.openIframe();
        }

    </script>



</body>

</html>
