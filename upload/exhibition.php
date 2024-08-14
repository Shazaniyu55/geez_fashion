<?php
include 'include/connection.php';
include 'auth-script/fetch_entry.php';
include 'auth-script/voters_detail.php';

if ( isset( $_GET['msg'] ) ) 
$msg= ($_GET['msg']);
    if(empty($msg)){
        $msg="none";
        $error="none";
    }

if ( isset( $_GET['login'] ) ) 
$login= ($_GET['login']);
    if(empty($login)){
        $login="none";
    } 

    if(empty($name)){
        $name="";
        $logout="none";
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Vote your choice to the Finale of the nigeria hair fashion exhibition, Powered by Geez.">
    <meta name="author" content="Geez">
    <meta name="robots" content="index" />
    <meta name="googlebot" content="index">
    <meta name="robots" content="max-snippet:20">
    <meta name="robots" content="max-image-preview:standard">
    <meta name="theme-color" content="#ba0737">
    <link rel="canonical" href="https://geez.fashion/exhibition"/>
    
    <meta property="og:url" content="https://geez.fashion/exhibition" />
    <meta property="og:type" content="geez.fashion" />
    <meta property="og:title" content="Register || Geez" />
    <meta property="og:description" content="Vote your choice to the Finale of the nigeria hair fashion exhibition, Powered by Geez." />
    <meta property="og:image" content="https://geez.fashion/img/logo.png">
    
    <title>Vote your choice with Geez</title>
    <meta property="og:image" content="https://geez.fashion/img/logo.png">
    <link rel="apple-touch-icon" href="https://geez.fashion/img/logo.png">
    <link rel="icon" type="image/png" href="img/logo.png">
    
    <!--Template based on URL below-->
    <link rel="canonical" href="">
     <link href="css/exhibition.css" rel="stylesheet" type="text/css">
     <link href="css/popup.css" rel="stylesheet" type="text/css">
     <link href="css/style.css" rel="stylesheet" type="text/css">
     <link href="css/login.css" rel="stylesheet" type="text/css">
     <link href="css/animation/animate.css" rel="stylesheet" type="text/css">
     <link href="css/animate.css" rel="stylesheet" type="text/css">
     <link href="css/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet" type="text/css">
     <link href="css/forms.css" rel="stylesheet" type="text/css">
   
</head>

<body style="background: #222222;">
      
       <div id="popup" class="popup" style="display: <?php echo $login ?>">
           <div onclick="closeAll()" class="blur"></div>
           <div class="container">
              <form method="post" action="process/reg-voters">
                  <h2>Signup</h2>
                  <p>please signup to vote for your desired entry.</p>
                   <input type="text" name="Name" placeholder="Name" required>
                   <input type="email" name="Email" placeholder="Email" required>
                   <button type="submit" class="btn">Signup</button>
               </form>
           </div>
       </div>
       
        <!-- Exhibition 
         ================================================== -->
         
         
        <p id="exe" class="exe-msg" style="text-align: center; display: <?php echo $error ?>"><?php echo $msg ?></p>
         
         
        <div onclick="closeAll()" class="exhibition">
                    
            <div class="sub-head">
                <img src="img/logo.png">  
                <div class="writeup">   
                <h2>Explore Entries</h2>
                <p><?php echo $name ?> Vote your choice to the Finale of the nigeria hair show, Powered by Geez</p>
                </div>
                
                <nav>
                    <ul>
                        <a href="home"><li>Home</li></a> 
                        <a href="t&c"> <li>Terms & Condition</li></a>
                        <a style="display: <?php echo $logout ?>" href="logout"> <li>Logout</li></a>
                    </ul>
                </nav>
            </div>
            
            
            <div class="container">
                
                <?php $i=0.7; foreach($entrys as $entry){
                    if($last_vote==$entry['id']){
                        $vote="none";
                        $icon="block";
                    }else{
                        $icon="none";
                        $vote="block";
                    }
                ?>
                   
                <div id="<?php echo $entry['id'] ?>" class="entry" style=" animation-duration: <?php echo $i++ ?>s;">
                    <div class="overlay"><h2><i class="fas fa-vote-yea"></i> <br>VOTES <br> <?php echo $entry['vote'] ?></h2></div>
                    <img src="entrys/img/<?php echo $entry['image'] ?>">
                    <div class="detail">
                        <div class="user">
                            <i class="fas fa-user"></i>
                            <p><?php echo $entry['business_name'] ?> </p>
                        </div>
                        <div class="icon">
                           <form method="post" action="process/vote">
                              <input type="hidden" name="Id" value="<?php echo $entry['id'] ?>">
                              <input type="hidden" name="VoterId" value="<?php echo $id ?>">
                              <input type="hidden" name="Email" value="<?php echo $email ?>">
                               <i style="display: <?php echo $icon ?>" class="fas fa-check"></i>
                               <button style="display:<?php echo $vote ?>"> vote</button>
                           </form>
                            
                            <i style="display:none" class="fas fa-check"></i>
                        </div>
                    </div>
                </div>
                
                <?php } ?>
                
                
                
            </div>
            
        </div>        
        <!-- Exhibition 
        
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
    <script src="javascript/img-upload.js"></script>
    <script src="javascript/jquery-3.6.0.min.js"></script>
    
    <script>
     
        
         $(window).on('load',function(){
        $(".exe-msg").delay(10000);
        $(".exe-msg").fadeOut(500);
    })
         
         function closeAll() {
      document.getElementById("popup").style.display = "none";
      document.getElementById("exe").style.display = "none";
    }  
      
         function openProgress() {
      document.getElementById("progress").style.display = "block";
    } 
        
    </script>

</body>
</html>