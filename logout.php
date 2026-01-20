<?php require('header.php'); ?>
<style>
.goodbye-container {
    text-align: center;
    padding: 60px 20px;
    max-width: 600px;
    margin: 0 auto;
    font-family: "Cormorant Garamond", serif;
    color: #5a3d40;
}

.goodbye-icon {
    font-size: 4rem;
    margin-bottom: 20px;
    color: #e8b4bc;
}

.goodbye-message {
    font-size: 1.8rem;
    margin-bottom: 25px;
    line-height: 1.4;
}

.goodbye-subtext {
    font-size: 1.1rem;
    color: #8a6e75;
    margin-bottom: 30px;
}

.btn-home {
    display: inline-block;
    padding: 12px 32px;
    background: linear-gradient(135deg, #f8e9eb, #f2d7dc);
    border: 2px solid #e8b4bc;
    border-radius: 12px;
    color: #5a3d40;
    text-decoration: none;
    font-weight: 500;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(194, 122, 135, 0.2);
}

.btn-home:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(194, 122, 135, 0.3);
}

@keyframes fadeOut {
    from { opacity: 1; transform: translateY(0); }
    to { opacity: 0; transform: translateY(20px); }
}

.auto-redirect {
    animation: fadeOut 1s ease 4s forwards;
}
</style>

<div class="goodbye-container auto-redirect">
    <div class="goodbye-icon">👋</div>
    <h1 class="goodbye-message">До новых встреч!</h1>
    <p class="goodbye-subtext">Вы успешно вышли из системы. Через 5 секунд вы будете перенаправлены на главную страницу.</p>
    <a href="index.php" class="btn-home">Вернуться сейчас</a>
</div>

<script>
// Автоматический редирект через 5 секунд
setTimeout(() => {
    window.location.href = 'index.php';
}, 5000);
</script>

<?php require('footer.html'); ?>