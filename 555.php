		<form action="" method="POST">

				<input class="form-control text-center" type="text" size="80" name="user" id="user" placeholder="ชื่อผู้ใช้งาน ภาษาอังกฤษเเละตัวเลขเท่านั้น"required/>
<br>


			<input class="form-control text-center" type="text" size="80" name="pass" id="pass" placeholder="รหัสผ่าน อย่าใส่สัญสักเพื่อไม่ไห้ระบบผิดพลาด"required/><br>
			<input type="submit" class="btn btn-success" value="สร้างบัญชี" name="submit" class="button alt"/>
		</form>
<?php 
if ($_POST) { 
include('Net/SSH2.php');

$username = $_POST['user'];
$password = $_POST['pass'];

$ssh = new Net_SSH2('45.77.176.234');
$ssh->login('root', '-#&-7_$$&_##-+64$_#_&$_##&(8') or die("Login failed");
$ssh->getServerPublicHostKey();
$cmd = "sudo userdel $username";
$cmd = "sudo useradd -d /home/$username -p $(perl -e'print crypt(\"$password\", \"cu\")') -e `date -d '5 days' +'%Y-%m-%d'` $username";
$cmdr = $ssh->exec($cmd);
echo "บัญชีใช้งาน SSH/OPENVPN สำเร็จ..!!";
echo "<br>";
echo "IP: ใส่ไอพี";
echo "<br>";
echo "PortSSH: 22 , PortOVPN: 443"; 
echo "<br>";
echo "Proxy: ใส่ไอพี:8080";
echo "<br>";
echo "User: $username Pass: $password";
echo "<br>";
echo "ใช้งานได้ 5 วัน";
echo "<br>";

}
?>
