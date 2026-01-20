<?php

    require_once('DB.php');
    require_once('header.php');
    // var_dump($_GET);
    $sql="SELECT * FROM `kotik` WHERE `id`=".$_GET['id'];
    $result=mysqli_query($mysqli, $sql);
    if(mysqli_errno($mysqli)) echo mysqli_error();
    $row=mysqli_fetch_assoc($result);
    // var_dump($row);
?>
    <div class="container">
    <div class="label-content">
        <label for="idfirstname">Фамилия</label>
        <input type="text" name="firstname" id="idfirstname" value="<?=$row ['first_name'];?>" readonly>
    </div>     
    <div class="label-content">
        <label for="idname">Имя</label>
        <input type="text" name="name" id="idname" value="<?=$row ['name'];?>" readonly>
    </div>
    <div class="label-content">
        <label for="idlastname">Отчество</label>
        <input type="text" name="last_name" id="idlastname" value="<?=$row ['last_name'];?>" readonly>
    </div>
    <div class="label-content">
        <label for="idemail">Email</label>
        <input type="email" name="email" id="idemail" value="<?=$row ['email'];?>" readonly>
    </div>
    <div class="label-content">
        <label for="idphone">Phone</label>
        <input type="tel" name="phone" id="idphone" value="<?=$row ['phone'];?>" readonly>
    </div>
    <div class="label-content">
        <label for="idaddres">Addres</label>
        <input type="addres" name="idadress" id="idadress" value="<?=$row ['address'];?>" readonly>
    </div>
    <a class="btn btn-illuminated" href="update.php?id=<?=$row['id'];?>">Изменить друга</a>    
    <a class="btn btn-illuminated" href="query.php?id=<?=$row['id'];?>">Удалить друга</a>    
    <form action="" method="post">
        <div class="div-flex">
          <label for="idComment">Оставьте комментарий</label>
          <textarea name="comment" id="idComment" cols="149" rows="10"></textarea>
        </div>
          <button type="submit" class="btn btn-illuminated">Сохранить</button>  
        
         
    </form>
</div>
