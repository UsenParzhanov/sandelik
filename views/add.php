<?php require Root.'/templates/header.php'; ?>





<div id="wrapper">
		
		<div id="left">
		    
                <form action="add" method="post">
                    <input name="tag" type="text" maxlength="30" placeholder="Тег">
                    <textarea name ="text" placeholder="Добавьте запись"></textarea>
                    <?php
                        if(isset($proverka)){
                            echo $proverka;
                        }
                    ?>
                    <input name="addButton" type="submit" value="Добавить">
                </form>
                
		</div>
		<div id="right">
			<div class="account">
			    <div class="userPhoto" data-photo="<?php echo $userInfo['image_path'];?>"></div>
			    <ul>
			        <li>Имя: <?php echo $userInfo['user_name'];?></li>
                                <?php if($userInfo['user_surname']==!0){
                                    echo '<li>Фамилия: '.$userInfo["user_surname"].'</li>';
                                }  
                                if($userInfo['user_sex']==!0){
                                    echo '<li>Пол: '.$userInfo["user_sex"].'</li>';
                                }  
                                
                                ?> 
<!--			        <li>Плохие дни: 15</li>
			        <li>Хорошие дни: 58</li>-->
			    </ul>
			</div>
			<ul>
				<li><a href="main">Записи</a></li>
				<li><a href="add" class="active">Добавить</a></li>
                                <li><a href="account">Настройки</a></li>
				<li><a href="exit">Выход</a></li>
			</ul>
			
			
			
		</div>
		
</div>







<?php require Root.'/templates/footer.php'; ?>