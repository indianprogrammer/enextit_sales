<?php
$hexchal = pack ("H32", $challenge);
$newchal = pack ("H*", md5($hexchal . $uamsecret));
$response = md5("\0" . $password . $newchal);
$newpwd = pack("a32", $password);
$pappassword = implode ("", unpack("H32", ($newpwd ^ $newchal)));
?>

<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">
<html>
<head>
  <title>ISP jet</title>
  <meta http-equiv="Cache-control" content="no-cache">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="refresh" content="0;url=http://<?= $uamip ?>:<?= $uamport ?>/logon?username=<?= $username ?>&password=<?= $pappassword ?>">;
</head>
<body>
<h1 style="text-align: center;">Logging in</h1>
  <center>
      Please wait
  </center>
</body>
</html>

