<?php require Root.'/templates/header.php'; ?>





<div id="wrapper">
		
		<div id="left">
		    
                <form action="account" method="post" enctype="multipart/form-data">
                    <input name="name" type="text" maxlength="30" placeholder="Введите ваше имя" data-name="<?php echo $userInfo['user_name']; ?>">
                    <input name="surname" type="text" maxlength="30" placeholder="Введите вашу фамилию" data-surname="<?php 
                    
                    if($userInfo['user_surname']==!0 or $userInfo['user_surname']==!""){
                        echo $userInfo['user_surname'];
                    }  else {
                        echo 'Введите вашу фамилию';
                    }
                    
                     ?>">
                    <?php
                    $oneSex="";
                    $twoSex="";
                    $threeSex="";
                    $sex = $userInfo["user_sex"];
                     switch ($sex){
                        case "0":
                            $oneSex ='selected';
                            break;
                        case 'Мужчина':
                            $twoSex = 'selected';
                            break;
                        case 'Женщина':
                            $threeSex = 'selected';
                            break;
                     }
                    ?>
                    <select name = "sex">
                        <option <?php echo $oneSex; ?>>Неважно</option>
                        <option <?php echo $twoSex; ?>>Мужчина</option>
                        <option <?php echo $threeSex; ?>>Женщина</option>
                    </select>
                    <input type="file" name="uploadPhoto">
                    <?php
                    if(isset($proverka) or isset($saved)){
                        if(isset($proverka)){
                            echo $proverka;
                        }
                        
                        if(isset($saved)){
                            echo $saved;
                        }
                        
                    }
                    ?>
                    <input name="updateButton" type="submit" value="Сохранить">
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
				<li><a href="add">Добавить</a></li>
                                <li><a href="account" class="active">Настройки</a></li>
				<li><a href="exit">Выход</a></li>
			</ul>
			
			
			
		</div>
		
</div>







<?php require Root.'/templates/footer.php'; ?>