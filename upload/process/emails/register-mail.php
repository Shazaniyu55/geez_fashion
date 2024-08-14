<?php
include '../../include/connection.php';

if ( isset( $_GET['email'] ) ) 
$email = ($_GET['email']);
    if(empty($email)){
        $email="";
}

if ( isset( $_GET['code'] ) ) 
$code = ($_GET['code']);
    if(empty($code)){
        $code="";
}


 $sql= "SELECT * FROM users WHERE email='$email'";
       $result= $conn->query($sql);
       if ($result->num_rows > 0) 
        while($row = $result->fetch_assoc()){
         $name = $row["name"];
//        header ("Location: ../model"). exit();
      }


$verify="block";
//header ("Location: ../login?email=$email&verify=$verify");

$subject = 'CONFIRMATION CODE -- Geez Hair Show Sign Up';
$message = '<h2>Hello ' .$name. '</h2>
            <p>Your sign-up confirmation Code is-- <span style="font-size:20px"> <strong>' .$code. '</strong></span></p>
            <p>Use this code provided to verify your Geez entry account.</p>
            <p><strong>Note:</strong> Do not share this code with any one else,</p>
            <p>make sure you are on www.geez.fashion before using this code.<br>
            This show is focused on the development of the fashion industry by <br>
            creating awearness for upcoming hairstylist in the country.</p>';


                            
                            $header='<h1 style="Background:#f79800; padding: 20px; color:#fff; font-family:Arial,sans-serif; font-size:25px; line-height:30px;text-align:center; font-weight:700;">Geez.fashion</h1>';

                            $body='<p style="padding-bottom: 10px;font-family: Arial,sans-serif;text-align:center;line-height:20px;">' .$message. '</p>';
                             $write = '<html>
                            <table style="background:#f4f4f4; height:600px;">
                                        <table bgcolor="#fff" style="margin-left:auto;margin-right:auto; width:90%; padding:20px;">
																	<tr>
																		<td>
																			' .$header. '
																		</td>
																	</tr>
																	
																	<tr>
																		<td>
																			' .$body. '
																		</td>
																	</tr>
    </table>
                <table bgcolor="#f4f4f4" style="margin-left:auto;margin-right:auto; width:90%; padding:20px;">
					<tr>
						<td align="center" valign="top">
								<tr>
									<td class="text-bottom" style="width: 90%; padding: 35px 15px; color:#888888;Arial,sans-serif; font-size:11px; line-height:18px; text-align:center;">
										Proudly sponsored by Geez.<br />
										Signup on Geez.fashion. <br />
                                        Contact: +234 08** *** **** | +234 08** *** ****<br />
                                        Email: support@geez.fashion <br />
                                        Terms of Service: https://geez.fashion/terms | 
                                        Login: https://geez.fashion/login
									</td>
								</tr>
						</td>
					</tr>
				</table>
                                        				</table>
                                                            </html>';



//    // send mail to registered person
//    require_once("PHPMailer/src/PHPMailer.php");
//    require_once("PHPMailer/src/SMTP.php");
//
//    $mail = new PHPMailer\PHPMailer\PHPMailer();
//    $mail->IsSMTP(); // enable SMTP
//
//    $mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
//    $mail->SMTPAuth = true; // authentication enabled
//    $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
//    $mail->Host = "geez.fashion";
//    $mail->Port = 587; // or 587
//    $mail->IsHTML(true);
//    $mail->Username = "e-alert@geez.fashion";
//    $mail->Password = "^;&_-+so]#pN";
//    $mail->SetFrom("e-alert@geez.fashion", 'Geez fashion E-ALERT');
//    $mail->AddReplyTo("support@geez.fashion", 'Geez fashion Support Admin');
//    $mail->Subject = "$subject";
//    $mail->Body = "$write";
//    $mail->Altbody="$message.";
//    $mail->AddAddress("$email");
//
//
//     if(!$mail->Send()) {
//    echo ("");
//     } else {
//        echo ("sent");
//    }
 

?>

<html>
    <table style="background:#f4f4f4; height:600px; width: 100%">
        <table bgcolor="#fff" style="margin-left:auto;margin-right:auto; width:90%; padding:20px;">
            <tr>
                <td>
                   <?php echo $header ?>
                </td>
            </tr>

            <tr>
                <td>
                    <?php echo $body ?>
                </td>
            </tr>
        </table>
        <table bgcolor="#f4f4f4" style="margin-left:auto;margin-right:auto; width:90%; padding:20px;">
            <tr>
                <td align="center" valign="top">
            <tr>
                <td class="text-bottom" style="width: 90%; padding: 35px 15px; color:#888888; font-family: Arial,sans-serif; font-size:11px; line-height:18px; text-align:center;">
                    Proudly sponsored by Geez.<br />
                    Signup on Geez.fashion. <br />
                    Contact: +234 08** *** **** | +234 08** *** ****<br />
                    Email: support@geez.fashion <br />
                    Terms of Service: https://geez.fashion/terms |
                    Login: https://geez.fashion/login
                </td>
            </tr>
            </td>
            </tr>
        </table>
    </table>
</html>
