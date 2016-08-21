<?php require Root.'/templates/header.php'; ?>
        <div id="wrapper">
                <p id="logo">SANDELIK.COM</p>
		<div id="inthecandelik">
                    <form action="login" method="post">
				<input name="user_name" type="text" maxlength="30" placeholder="Имя">
                                <input name="user_password" type="password" placeholder="Пароль">
                                <input name="submitIN" type="submit" value="ВОЙТИ">
                    </form>
			
		</div>
		
		<div id="inthecandelik">
                        <form action="logup" method="post">
				<input name="user_name" type="text" maxlength="30" placeholder="Имя">
                                <input name="user_password" type="password" placeholder="Пароль">
				<input name="submitUP" type="submit" value="Зарегистрироваться">
			</form>
			
		</div>
<!--		<h2>Что такое CANDELIK?</h2><img src="/templates/images/down.png" alt="Вниз" width="40">-->
	</div>
<?php require Root.'/templates/footer.php'; ?>