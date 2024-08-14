<?php
include 'include/connection.php';
include 'auth-script/fetch_detail.php';

if ( isset( $_GET['email'] ) ) 
$email= ($_GET['email']);
    if(empty($email)){
        $email="none";
    }

if ( isset( $_GET['verify'] ) ) 
$verify= ($_GET['verify']);
    if(empty($verify)){
        $verify="none";
    }else{
        $signin= "none";
    }

if ( isset( $_GET['done'] ) ) 
$done= ($_GET['done']);
    if(empty($done)){
        $done="none";
    }else{
        $signin= "none";
    }

if ( isset( $_SESSION['entry'] ) ) 
$entry= ($_SESSION['entry']);
    if(empty($entry)){
        $entry="none";
    }else{
        $signin= "none";
    }

if ( isset( $_GET['msg'] ) ) 
$msg= ($_GET['msg']);
    if(empty($msg)){
        $msg="";
        $error="none";
    }

if ( isset( $_GET['final'] ) ) 
$final= ($_GET['final']);
    if(empty($final)){
        $final="none";
    }else{
        $signin= "none";
    }

if(empty($page_id)){
    $page_id="";
    $signin= "block";
    $verify="none";
    $done="none";
    $entry="none";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="This is a one time entry process please fill all informations correctly to verify your email">
    <meta name="author" content="Geez">
    <meta name="robots" content="index" />
    <meta name="googlebot" content="index">
    <meta name="robots" content="max-snippet:20">
    <meta name="robots" content="max-image-preview:standard">
    <meta name="theme-color" content="#ba0737">
    <link rel="canonical" href="https://geez.fashion/login" />


    <meta property="og:url" content="https://geez.fashion/login" />
    <meta property="og:type" content="geez.fashion" />
    <meta property="og:title" content="Register || Geez" />
    <meta property="og:description" content="This is a one time entry process please fill all informations correctly to verify your email" />
    <meta property="og:image" content="https://geez.fashion/img/logo.png">

    <title>Register || Geez</title>

    <link rel="apple-touch-icon" href="https://geez.fashion/img/logo.png">
    <link rel="icon" type="image/png" href="img/logo.png">

    <!--Template based on URL below-->
    <link rel="canonical" href="">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/style-mobile.css" rel="stylesheet" type="text/css">
    <link href="css/login.css" rel="stylesheet" type="text/css">
    <link href="css/animation/animate.css" rel="stylesheet" type="text/css">
    <link href="css/animate.css" rel="stylesheet" type="text/css">
    <link href="css/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet" type="text/css">
    <link href="css/forms.css" rel="stylesheet" type="text/css">
    <link href="css/progress.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="heading">
        <nav>
            <a href="index">
                <div class="logo"></div>
            </a>

            <ul>
                <a href="index">
                    <li>Home</li>
                </a>
                <a href="about">
                    <li>About</li>
                </a>
                <a href="login">
                    <li class="active">Register</li>
                </a>
                <a href="model">
                    <li>Models</li>
                </a>
                <a href="contact">
                    <li>Contact</li>
                </a>

                <a href="exhibition"><button> Vote<br> Your Choice </button></a>
            </ul>



            <div class="mobile-menu">
                <i onclick="openMenu()" class="fas fa-list"></i>
                <div id="menu" class="drop-down">
                    <ul onclick="closeMenu()">
                        <a href="index">
                            <li>Home</li>
                        </a>
                        <a href="home#about">
                            <li>About</li>
                        </a>
                        <a href="login">
                            <li class="active">Register</li>
                        </a>
                        <a href="model">
                            <li>Models</li>
                        </a>
                        <a href="contact">
                            <li>Contact</li>
                        </a>
                        <a href="exhibition"> <button class="btn">Vote Your Choice</button></a>
                    </ul>
                </div>
            </div>
        </nav>
    </div>


    <div onclick="showNotice()" id="progress" class="progress">
        <div class="hold">
            <div class="loading"></div>
        </div>
    </div>


    <!-- Aside Sliders
    ================================================== -->
    <div onclick="closeMenu()" class="login">

        <aside>
            <div class="bg mySlides fadein"><span class="dot"></span></div>
            <div class="bg2 mySlides fadein"><span class="dot"></span></div>
            <div class="bg3 mySlides fadein"><span class="dot"></span></div>
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

            <form method="post" action="process/reg-user" style="display: <?php echo $signin ?>;">
                <h2>sign up</h2>
                <p>This is a one time entry process please fill all informations correctly to verify your email.</p>
                <input type="text" name="Name" autocomplete="off" placeholder="Full Name" required>
                <input type="email" name="Email" placeholder="Email" required>
                <input type="text" name="State" placeholder="State of Residence" required>
                <input type="tel" name="Phone" autocomplete="off" maxlength="11" placeholder="Phone" required>

                <select name="Category" required>
                    <option value="">Select Category</option>
                    <option value="Hair Stylist">Hair Stylist</option>
                    <option value="Modeling">Modeling</option>
                    <option value="Fashion Designer">Fashion Designer</option>
                    <option value="Make-up Artist">Make-up Artist</option>
                </select>

                <input type="text" name="Business" autocomplete="off" placeholder="Business Name" required>
                <textarea name="Detail" spellcheck="true" autocomplete="off" placeholder="Business detail" required></textarea>
                <div class="check">
                    <input type="checkbox" required>
                    <p>I agree to GEEZ <a href="terms" style="color:#ff0045">Terms And Conditions</a> </p>
                </div>
                <button type="submit" class="btn">Submit</button>
            </form>

            <form id="down" method="post" action="process/verify-user" style="display: <?php echo $verify ?>">
                <div class="form-notice">
                    <i class="fas fa-envelope"></i>
                    <p style="color: <?php echo $color ?>"><span><?php echo $msg ?> </span>Verification <br>please check your email <strng>(<?php echo $email ?>)</strng> for verification code</p>
                    <input type="text" name="Code" autocomplete="off" id="VerifyCode" placeholder="Verification  Code" maxlength="4" required>
                    <input type="hidden" name="Email" value="<?php echo $email ?>">
                    <button type="submit" onclick="openProgress()" class="btn">Confirm</button>
                </div>
            </form>

            <form id="done" method="post" action="" style="display: <?php echo $done ?>">
                <div class="form-notice">
                    <i class="fas fa-check"></i>
                    <p>Welcome !!<br> <?php echo $name ?> to complete registration you are to pay the sum of <b>#5,000</b> so you can make your entry for participation.</p>
                    <button type="button" payWithPaystack() class="btn">Pay #5,000</button>
                    <!--                    <button type="button" onclick="openEntry()" class="btn">Proceed</button>-->
                </div>
            </form>

            <form id="entry" method="post" action="process/upload-entry" enctype="multipart/form-data" style="display: <?php echo $entry ?>">
                <h2>Entry</h2>
                <div class="form-notice">
                    <p style="text-align: left">Upload an image as your entry category selected by you e.g (Hair Stylist, Modeling, Fashion, Designer, Make-up Artist). Please make sure image is clear and file size is not more than (2mb)</p>

                    <div class="imgGallery">
                        <!-- image preview -->
                    </div>

                    <input type="file" name="fileToUpload" id="chooseFile" required>

                    <input type="hidden" name="Name" value="<?php echo $name ?>">

                    <input type="hidden" name="Id" value="<?php echo $id ?>">

                    <input type="hidden" name="Business" value="<?php echo $business ?>">

                    <textarea name="Detail" id="WriteUp" placeholder="About Hair e.g hair style, design, fashion, makeup, style and more" required></textarea>

                    <button type="submit" onclick="openProgress()" class="btn">Proceed</button>
                </div>
            </form>

            <form method="post" action="" style="display: <?php echo $final ?>">
                <div class="form-notice">
                    <p>Your entry was successful, you can now share your vote link to the bellow platform, by clickig on the plaform icon</p>
                    <div class="share-icon">
                        <a href="https://api.whatsapp.com/send?phone=&text=https://geez.fashion/exhibition%23<?php echo $id ?>%20vote%20for%20<?php echo $name ?>%2E%20i%20am%20a%20contestant%20in%20the%20nigeria%20hair%20show" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://geez.fashion/exhibition%23<?php echo $id ?>" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="https://www.instagram.com/" target="_blank"> <i class="fab fa-instagram"></i></a>
                        <a href="https://geez.fashion/exhibition#<?php echo $id ?>" target="_blank"> <i class="fas fa-share"></i></a>
                    </div>
                    <a href="exhibition#<?php echo $id ?>"><button type="button" class="btn">View Entry</button></a>
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




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="javascript/jquery-3.5.1.slim.min.js"></script>
    <script src="javascript/hero-slide.js"></script>
    <script src="javascript/img-upload.js"></script>
    <script src="javascript/menu.js"></script>
    <script src="javascript/jquery-3.6.0.min.js"></script>

    <script>
        var amount = <?php echo(json_encode($amount)); ?>;
        var emailer = <?php echo(json_encode($email)); ?>;

        function payWithPaystack() {
            let handler = PaystackPop.setup({
                key: 'pk_live_afe92685370a161d37df82599a5a48b16ada488e', // Replace with your public key
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
                    window.location.href = "process/update_user?transactionhash=" + referenced;
                }
            });
            handler.openIframe();
        }

    </script>

    <script>
        $(window).on('load', function() {
            $(".exe-log").delay(10000);
            $(".exe-log").fadeOut(500);
        })

        var chooseFile = document.getElementById("chooseFile");
        var WriteUp = document.getElementById("WriteUp");
        var VerifyCode = document.getElementById("VerifyCode");

        chooseFile.onfocus = function() {
            document.getElementById("progress").style.display = "none";
        }

        WriteUp.onfocus = function() {
            document.getElementById("progress").style.display = "none";
        }

        VerifyCode.onfocus = function() {
            document.getElementById("progress").style.display = "none";
        }

        function openEntry() {
            document.getElementById("entry").style.display = "block";
            document.getElementById("done").style.display = "none";
        }

        function openProgress() {
            document.getElementById("progress").style.display = "block";
        }

    </script>



</body>

</html>
