    <?php require ('db.php');?>
<?php require('header.php');?>
<?php
 $sql='SELECT * FROM `users`';
    $result=mysqli_query($mysqli,$sql);
    if (mysqli_errno($mysqli)) echo mysqli_error(); 
    ?>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Login</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Присвоить роль читателя</th>
                    </tr>
                </thead>
                <?php while($row=mysqli_fetch_assoc ($result)):?> 
                <tr>
                <th><?php echo $row['id'];?></th> 
                <th><?php echo $row['login']?></th>
                <th><?php echo $row['email']?></th>
                <th><?php echo $row['role']?></th>
                <th><a href="query.php?role=<?=$row['id'];?>">Ок</a></th>
                </tr>
                <?php endwhile ?>
            </table>
        </div>
<?php require('footer.html');?>  
