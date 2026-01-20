<?php require('header.php');?>
<form action="query.php" method="post">
            <label for="IDfirstname">Введите Фамилию</label><br>
            <input type="text" name="first_name" id="IDfristname"><br>
        <br>
        <label for="IDname">Введите Имя</label><br>    
        <input type="text" name="name" id="IDname"><br>
        <br>
        <label for="IDlastname">Введите Отчество</label><br>
        <input type="text" name="last_name" id="IDlastname"><br>
        <br>
        <label for="IDphone">Введите Телефон</label><br>
        <input type="tel" name="phone" id="IDphone"><br>
        <br>
        <label for="IDadress">Введите Почта</label><br>
        <input type="email" name="email" id="IDemail"><br>
        <br>
        <label for="IDaddress">Введите Адрес</label><br>
        <textarea name="address" id="IDaddress" cols="30" rows="10"></textarea>
        <input type="hidden" name="creater">
        <button type="submit" class="btn btn-illuminated">Отправить</button>
        
</form>
<?php require('footer.html');?>
