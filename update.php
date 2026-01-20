
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
        <form action="query.php" method="post">
        <input type="hidden" name="update">
        <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    <div class="label-content">
        <label for="idfirstname">Фамилия</label>
        <input type="text" name="firstname" id="idfirstname" value="<?=htmlspecialchars($row['first_name']);?>">
    </div>     
    <div class="label-content">
        <label for="idname">Имя</label>
        <input type="text" name="name" id="idname" value="<?=$row ['name'];?>" >
    </div>
    <div class="label-content">
        <label for="idlastname">Отчество</label>
        <input type="text" name="last_name" id="idlastname" value="<?=$row ['last_name'];?>" >
    </div>
    <div class="label-content">
        <label for="idemail">Email</label>
        <input type="email" name="email" id="idemail" value="<?=$row ['email'];?>" >
    </div>
    <div class="label-content">
        <label for="idphone">Phone</label>
        <input type="tel" name="phone" id="idphone" value="<?=$row ['phone'];?>" >
    </div>
    <div class="label-content">
        <label for="idaddress">Address</label>
        <input type="text" name="address" id="idaddress" value="<?=htmlspecialchars($row['address']);?>">
    </div>
    <button type="submit" class="btn btn-illuminated">Изменить</button>
    </form>
</div>