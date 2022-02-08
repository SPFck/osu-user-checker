<?php

#error_reporting(0);

$username_l = $_POST["username"];
$data_p = "user[username]=$username_l&user[user_email]=az0170@gmail.com&user[password]=azthegoat958&check=1";
$headers = [
	"User-Agent: osu!",
	"Content-type: application/x-www-form-urlencoded; boundary=-----------------------------0"
];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://osu.ppy.sh/users");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_p);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($ch);
curl_close($ch);

if(strpos($res, "form_error")) {
	$res = json_decode($res, true);
	echo "[$username_l] => ".$res["form_error"]["user"]["username"][0];
} else {
	echo "Username avaliable!";
}

?>