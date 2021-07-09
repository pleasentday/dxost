<?php 

	require 'db.php';

	$data = $_POST;
	if ( isset($data['submit']) )
	{
		// registratsiya qilamiz	

		$errors = array();
		// if ( trim($data['surname']) == '') 
		// {
		// 	$errors[] = '';
		// }

		// if ( trim($data['email']) == '') 
		// {
		// 	$errors[] = '';
		// }

		// if ( trim($data['phone']) == '') 
		// {
		// 	$errors[] = 'Email kiriting';
		// }

		// if ($data['password'] == '') 
		// {
		// 	$errors[] = 'Parol kiriting';
		// }

		// if ( trim($data['password_2']) != $data['password']) 
		// {
		// 	$errors[] = "Ikkinchi parol noto'g'ri kiritilgan";
		// }

		if ( R::count('users', "phone = ?", array($data['phone'])) > 0 ) 
		{
			$errors[] = 'Bunday telefon raqami ruyhatdan utkazilgan!<hr>
			<div><a href="index.html">Orqaga</a>';
		}

		if ( R::count('users', "email = ?", array($data['email'])) > 0 ) 
		{
			$errors[] = 'Bunday emailli foydalanuvchi bor!<hr>
			<div><a href="index.html">Orqaga</a>';
		}

		if (empty($errors) ) 
		{
			// Xatolar yuq registratsiya qilamiz!
			$user = R::dispense('users');
			$user->surname = $data['surname'];
			$user->name = $data['name'];
			$user->email = $data['email'];
			$user->phone = $data['phone'];
			R::store($user);
			echo '<div style="color: green;">Siz registratisyadan utdingiz!</div><hr>';
			echo '<a href="index.html">Bosh sahifaga</a>';
		} else
		{
			echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
		}
	}
 ?>

<!-- 
 <form action="/signup.php" method="post">
 	
 	<p>
 		<p><strong>Login:</strong></p>
 		<input type="text" name="login" value="<?php echo @$data['login']; ?>">
 	</p>

 	<p>
 		<p><strong>Email:</strong></p>
 		<input type="email" name="email" value="<?php echo @$data['email']; ?>">
 	</p>

 	<p>
 		<p><strong>Parol:</strong></p>
 		<input type="password" name="password" value="<?php echo @$data['password']; ?>">
 	</p>

 	<p>
 		<p><strong>Parol ewe raz:</strong></p>
 		<input type="password" name="password_2" value="<?php echo @$data['password_2']; ?>">
 	</p>

 	<p>
 		<button type="submit" name="do_signup">
 			Zaregistrirovatsa
 		</button>
 	</p>
 	<div class="des-1-2" style="width: 100px;height: 50px;color: #fff;background: lightskyblue;display: flex;justify-content: center;align-items: center;border-radius: 5%;">
 		<a href="index1.php" style="text-decoration: none;color: #000;font-weight: 600;">
 			Orqaga
 		</a>
 	</div>

 </form> -->