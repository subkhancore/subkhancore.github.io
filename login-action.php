<?php
if (! empty($_POST["login"])) {
    session_start();
    $ip = $_SERVER['REMOTE_ADDR'];
    ob_start();
    system("arp -a $ip");
    $arp = ob_get_contents();
    ob_clean();

    $mac = $arp[19].$arp[20].$arp[21].$arp[22].$arp[23].$arp[24].$arp[25].$arp[26].$arp[27].$arp[28].$arp[29].$arp[30].$arp[31].$arp[32].$arp[33].$arp[34].$arp[35];
    $machash = sha1($mac);
    echo json_encode($ip);
    echo json_encode($mac);
    echo json_encode($machash);/*
    #kunci mac address sama ip.. cukup cek dengan database
    $username = filter_var($_POST["user_name"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    require_once ("./class/Member.php");
    
    $member = new Member();
    $isLoggedIn = $member->processLogin($username, $password, $machash);
    //echo json_encode($isLoggedIn);
    if (! $isLoggedIn) {
        $_SESSION["errorMessage"] = "Invalid Credentials";
    }

    $member = new Member();
    $memberId = $_SESSION["userId"];
    //echo json_encode($memberId);
    $2FA = $member->getFA($memberId);
    echo json_encode($2FA);
    
    #aplly 2FA.. jadi sistem kirim email isi otp buat dimasukin.. jadi ntar bakal muncul form baru yang dia minta kode otp. baru lempar ke index.
    #header("Location: ./index.php");*/
    exit();
} ?>