<?php


function Send_verify_mail($email,$vkey)
{
    require("PHPMailer/src/PHPMailer.php");
    require("PHPMailer/src/SMTP.php");
    require("PHPMailer/src/Exception.php");
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
    );

$mail->IsSMTP();
$mail->CharSet="UTF-8";
$mail->Host = 'smtp.gmail.com'; 
$mail->SMTPDebug = 0;
$mail->Port = 587; 
$mail->SMTPSecure = 'tls';
$mail->SMTPAutoTLS = false; 
$mail->SMTPAuth = true;
$mail->IsHTML(true);
$mail->Username = "firma.SW321@gmail.com"; 
$mail->Password = "Eloelo123";
$mail->setFrom('firma.SW321@gmail.com', 'Quizzzzzzz'); 
$mail->AddAddress($email); 
$mail->Subject = "Verify your account, Quizzzzzzz";
$mail->AddEmbeddedImage('img/SW.png','logo','img/SW.png');
$mail->Body = '<html lang="pl">
               <head>
               <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
               </head>
               <body style="background-color: white;
               color: black;
               font-family: sans-serif;
               font-size: 17px;">

               <div style=" justify-content: center;
               text-align: center;
               align-items: center;
               margin: auto;
               margin-bottom: 100px;
               margin-top: 30px;
               font-size: 17px;">';
               $mail->Body .= "Hello ".$email.". ";
               $mail->Body .= 'Click on link below to confirm yours register. If you did not register in our Quizzzz, ignore this message.
               <div style=""><a href="http://localhost/TI_Projekt_Quiz/verify.php?vkey=';$mail->Body .= $vkey;$mail->Body .='"><button type="button" style="background-color: blue;
                                                                                                                                    border: none;
                                                                                                                                    color: white;
                                                                                                                                    padding: 15px 32px;
                                                                                                                                    text-align: center;
                                                                                                                                    text-decoration: none;
                                                                                                                                    display: inline-block;
                                                                                                                                    font-size: 18px;
                                                                                                                                    margin: 4px 2px;
                                                                                                                                    margin-top: 20px;
                                                                                                                                    cursor: pointer;
                                                                                                                                    border-radius: 10px;" 
               >Verify</button></a></div>';
               $mail->Body .= '<div style="float: left; font-size: 12px; margin-bottom: 30px; "><img src="cid:logo" width = "62.75" height="41.25" style="margin-bottom: 10px;"><br/>
                                    Quizzzzz Sp. z.o.o<br/>
                                    st. Kwiatowa 17/20<br/>
                                    Katowice 40-111<br/>                              
                               </div>
               </div>
               </body>
               </html>';
    if(!$mail->Send()) 
    {
        //echo "Błąd wysyłania e-maila: " . $mail->ErrorInfo;
        return false;
    } 
    else 
    {
        //echo "Wiadomość została wysłana!";
        return true;
    }
}
function Check_name_quiz($str)
{
    $sprawdz = '/(\\-\\-)|(\\/)|(=)|[,;:.*)(<>%{}\'\"]|(\[)|(\])/';
    if(preg_match_all($sprawdz,$str))
    {
        return false;
    }
    return true;
}
function check_char($str)
{
    $sprawdz = '/\|/';
    if(preg_match($sprawdz,$str))
    {
        return true;
    }
    return false;
}



?>