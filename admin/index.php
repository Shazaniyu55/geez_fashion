<?php
include 'auth-script/conn.php';
include 'auth-script/fetch_entrys.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Admin Geez hair show 2022">
    <meta name="author" content="Geez">
    <meta property="og:image" content="https://geez.fashion/img/logo.png">
    <meta name="robots" content="noindex" />
    <meta name="googlebot" content="noindex">
    <meta name="googlebot-news" content="nosnippet">
    <meta name="theme-color" content="#7a0560">
    <title>Geez || Admin</title>

    <link rel="apple-touch-icon" href="https://geez.fashion/img/logo.png">
    <link rel="icon" type="image/png" href="img/logo.png">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/style-mobile.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>



    <nav>
        <div class="logo"></div>

        <ul>
            <li><a href="https://geez.fashion"><span class="material-icons">logout</span></a></li>
        </ul>
    </nav>

    <main>

        <aside class="left">
            <ul>
                <li onclick="openUsers()"> <span class="material-icons">people_alt</span> All Users</li>
                <li onclick="openEntry()"> <span class="material-icons">browser_updated</span> Entrys</li>
                <li onclick="openVoter()"> <span class="material-icons">how_to_reg</span> Voters</li>
                <li onclick="openModel()"> <span class="material-icons">person</span> Models</li>
            </ul>
        </aside>

        <div class="container" id="users" style="display: block">
            <div class="page-hd">
                <h2>All Users</h2>
            </div>

            <table id="table">
                <tr>
                    <th>N0</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>State</th>
                    <th>Biz_Name</th>
                    <th>Status</th>
                </tr>
                <?php $i=1; foreach($users as $user){ 
                            $unverified = "unverified";
                            $status = $user['verify'];
                            if($status == $unverified){
                                $red ="red";
                            }else{
                                $red ="";
                            }
                        ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $user['name'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td><?php echo $user['phone'] ?></td>
                    <td><?php echo $user['state'] ?></td>
                    <td><?php echo $user['business_name'] ?></td>
                    <td style="color:<?php echo $red ?>"><?php echo $user['verify'] ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>



        <div class="container" id="entry">
            <div class="page-hd">
                <h2>Users Entry <span onclick="closeAll()" class="material-icons">highlight_off</span></h2>
            </div>

            <table id="table">
                <tr>
                    <th>N0</th>
                    <th>Name</th>
                    <th>Biz_Name</th>
                    <th>Votes</th>
                    <th>Image</th>
                </tr>
                <?php $e=1; foreach($entrys as $entry){?>
                <tr>
                    <td style="width: 30px;"><?php echo $e++ ?></td>
                    <td><?php echo $entry['name'] ?></td>
                    <td><?php echo $entry['business_name'] ?></td>
                    <td><?php echo $entry['vote'] ?></td>
                    <td><a href="https://geez.fashion/exhibition#<?php echo $entry['id'] ?>" target="_blank"><span class="material-icons">panorama</span></a></td>
                </tr>
                <?php } ?>
            </table>
        </div>



        <div class="container" id="voter">
            <div class="page-hd">
                <h2>All Voters <span onclick="closeAll()" class="material-icons">highlight_off</span></h2>
            </div>

            <table id="table">
                <tr>
                    <th>N0</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Total Vote</th>
                    <th>Last Voted</th>
                </tr>
                <?php $i=0; foreach($voters as $voter){ ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $voter['name'] ?></td>
                    <td><?php echo $voter['email'] ?></td>
                    <td><?php echo $voter['casted_vote'] ?></td>
                    <td><?php echo $voter['last_vote'] ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>



        <div class="container" id="model">
            <div class="page-hd">
                <h2>Models <span onclick="closeAll()" class="material-icons">highlight_off</span></h2>
            </div>

            <table id="table">
                <tr>
                    <th>N0</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>Paid</th>
                </tr>
                <?php $i=0; foreach($models as $model){ 
                            $unpaid = "unpaid";
                            $status = $model['paid'];
                            if($status == $unpaid){
                                $paid ="red";
                            }else{
                                $paid ="";
                            }
                        ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $model['name'] ?></td>
                    <td><?php echo $model['email'] ?></td>
                    <td><?php echo $model['phone'] ?></td>
                    <td><?php echo $model['country'] ?></td>
                    <td><?php echo $model['state'] ?></td>
                    <td style="color:<?php echo $paid ?>"><?php echo $model['paid'] ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>


    </main><!-- /.container -->

    
        <div class="mobile_notice">
            <span class="material-icons">important_devices</span>
            <p>We are sorry to inform this page is only limited for desktop views only, Please access page from your desktop</p>
        </div>
        
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>
        function openUsers() {
            document.getElementById("users").style.display = "block";
            document.getElementById("entry").style.display = "none";
            document.getElementById("voter").style.display = "none";
            document.getElementById("model").style.display = "none";
        }

        function openEntry() {
            document.getElementById("entry").style.display = "block";
            document.getElementById("voter").style.display = "none";
            document.getElementById("model").style.display = "none";
            document.getElementById("users").style.display = "none";
        }


        function openVoter() {
            document.getElementById("entry").style.display = "none";
            document.getElementById("voter").style.display = "block";
            document.getElementById("model").style.display = "none";
            document.getElementById("users").style.display = "none";
        }

        function openModel() {
            document.getElementById("entry").style.display = "none";
            document.getElementById("voter").style.display = "none";
            document.getElementById("users").style.display = "none";
            document.getElementById("model").style.display = "block";
        }


        function closeAll() {
            document.getElementById("entry").style.display = "none";
            document.getElementById("voter").style.display = "none";
            document.getElementById("model").style.display = "none";
        }

    </script>

</body>

</html>
