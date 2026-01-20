<?php 
require('db.php');
require('header.php');

$sql = 'SELECT * FROM `kotik`';
$result = mysqli_query($mysqli, $sql);

if (!$result) {
    // Лучшая обработка ошибок
    die('Ошибка запроса: ' . mysqli_error($mysqli));
}
?>
<div class="container">
    <h1>Список контактов</h1>
    
    <?php if (mysqli_num_rows($result) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>№</th>
                    <th>Фамилия</th>
                    <th>Имя</th>
                    <th>Отчество</th>
                    <th>Телефон</th>
                    <th>Email</th>
                    <th>Адрес</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td>
                            <a href="card.php?id=<?php echo htmlspecialchars($row['id']); ?>">
                                <?php echo htmlspecialchars($row['first_name'] ?? ''); ?>
                            </a>
                        </td>
                        <td><?php echo htmlspecialchars($row['name'] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($row['last_name'] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($row['phone'] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($row['email'] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($row['address'] ?? ''); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Нет записей для отображения.</p>
    <?php endif; ?>
    
    <?php mysqli_free_result($result); ?>
</div>

<?php require('footer.html'); ?>