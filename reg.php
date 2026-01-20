<?php require('header.php'); ?>

<style>
/* ===== НАСЛЕДОВАНИЕ ОСНОВНЫХ ПЕРЕМЕННЫХ ===== */
:root {
    --main-pink: #cf888b;
    --soft-pink: #f9e0e2;
    --light-pink: #fdf2f3;
    --off-white: #fffaf8;
    --text-base: #6d4e52;
    --accent-hover: #e9a6a9;
    --shadow-soft: rgba(207, 136, 139, 0.3);
    --bubble-color: rgba(255, 200, 210, 0.6);
    --heart-color: rgba(255, 180, 190, 0.7);
    --star-color: rgba(255, 220, 150, 0.8);
    --cursor-trail-color: rgba(207, 136, 139, 0.3);
}

/* ===== ОБЩИЙ СТИЛЬ ТЕЛА ===== */
body {
    background: linear-gradient(135deg, #fdf7f8 0%, #fde8eb 35%, #fbdde1 70%, #f9d2d7 100%);
    background-attachment: fixed;
    min-height: 100vh;
    font-family: "Cormorant Garamond", "Georgia", serif;
    color: var(--text-base);
    line-height: 1.76;
    overflow-x: hidden;
    margin: 0;
    padding: 0;
    cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><circle cx="12" cy="12" r="6" fill="%23cf888b" opacity="0.7"/></svg>'), auto;
}

/* ===== КОНТЕЙНЕР РЕГИСТРАЦИИ ===== */
.registration-container {
    max-width: 720px;
    margin: 120px auto;
    padding: 60px 70px;
    border-radius: 60px;
    background: 
        linear-gradient(145deg, rgba(255, 255, 255, 0.96), rgba(254, 251, 252, 0.94)),
        rgba(255, 252, 253, 0.96);
    backdrop-filter: blur(20px);
    box-shadow:
        0 40px 100px var(--shadow-soft),
        0 16px 50px rgba(210, 140, 145, 0.22),
        inset 0 3px 14px rgba(255,255,255,0.92),
        inset 0 -3px 16px rgba(249, 224, 226, 0.4);
    position: relative;
    z-index: 2;
    border: 1px solid rgba(239, 200, 205, 0.6);
    animation: breathe 18s ease-in-out infinite;
    transform-style: preserve-3d;
    transition: transform 0.6s ease, box-shadow 0.6s ease;
}

.registration-container:hover {
    transform: translateY(-10px) scale(1.01);
    box-shadow:
        0 50px 120px var(--shadow-soft),
        0 20px 60px rgba(210, 140, 145, 0.26),
        inset 0 3px 16px rgba(255,255,255,1),
        inset 0 -3px 18px rgba(249, 224, 226, 0.45);
}

@keyframes breathe {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.02); }
}

/* ===== ЗАГОЛОВОК ===== */
h2.registration-title {
    font-family: "UnifrakturMaguntia", cursive;
    font-size: 3.2rem;
    text-align: center;
    color: #8a5b61;
    margin: 0 0 50px;
    letter-spacing: 1.6px;
    line-height: 1.1;
    text-shadow: 0 3px 6px rgba(255,255,255,0.6);
    position: relative;
    opacity: 0;
    animation: bloomIn 2.8s cubic-bezier(0.22, 0.61, 0.36, 1) forwards 0.6s;
}

h2.registration-title::after {
    content: " ✧";
    animation: twinkle 4s infinite alternate;
    display: inline-block;
    opacity: 0.9;
}

/* ===== ПОЛЯ ВВОДА ===== */
.form-group {
    margin-bottom: 32px;
}

.form-label {
    display: block;
    font-size: 1.25rem;
    font-weight: 500;
    color: #7a565a;
    margin-bottom: 10px;
    letter-spacing: 0.8px;
}

.form-control {
    width: 100%;
    padding: 14px 20px;
    font-size: 1.15rem;
    font-family: "Cormorant Garamond", serif;
    color: var(--text-base);
    background: rgba(255, 254, 255, 0.92);
    border: 1px solid rgba(230, 190, 195, 0.6);
    border-radius: 28px;
    box-shadow: inset 0 2px 6px rgba(255, 250, 251, 0.7);
    transition: all 0.35s ease;
    outline: none;
}

.form-control:focus {
    border-color: var(--accent-hover);
    box-shadow: 0 0 0 3px rgba(207, 136, 139, 0.2);
    transform: translateY(-2px);
}

/* ===== КНОПКА РЕГИСТРАЦИИ ===== */
.btn-register {
    font-family: "Cormorant Garamond", serif;
    font-size: 1.3rem;
    font-weight: 500;
    letter-spacing: 1.4px;
    background: linear-gradient(to bottom, var(--light-pink), #fde0e3);
    color: #855c63;
    border: 1px solid #f3c8cc;
    padding: 18px 42px;
    border-radius: 40px;
    cursor: pointer;
    transition: all 0.48s cubic-bezier(0.34, 1.56, 0.64, 1);
    box-shadow: 0 6px 14px rgba(207, 136, 139, 0.24);
    position: relative;
    overflow: hidden;
    z-index: 1;
    width: 100%;
    margin-top: 20px;
}

.btn-register::before {
    content: "";
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.8), transparent);
    transition: left 1s;
    z-index: -1;
}

.btn-register:hover {
    background: linear-gradient(to bottom, #fffdfd, #fdf6f8);
    transform: translateY(-8px) scale(1.04);
    box-shadow: 0 12px 28px var(--shadow-soft);
    border-color: var(--accent-hover);
}

.btn-register:hover::before {
    left: 100%;
}

/* ===== АНИМАЦИИ ИЗ ОСНОВНОГО СТИЛЯ ===== */
@keyframes bloomIn {
    0% { opacity: 0; transform: translateY(36px) scale(0.92); }
    70% { transform: translateY(-12px) scale(1.05); }
    100% { opacity: 1; transform: translateY(0) scale(1); }
}

@keyframes twinkle {
    0% { opacity: 0.5; transform: scale(0.95); }
    100% { opacity: 1; transform: scale(1.2); }
}

/* ===== АДАПТИВНОСТЬ ===== */
@media (max-width: 768px) {
    .registration-container {
        padding: 40px 30px;
        margin: 80px 16px;
    }

    h2.registration-title {
        font-size: 2.4rem;
    }

    .form-control {
        padding: 12px 16px;
        font-size: 1.05rem;
    }

    .btn-register {
        font-size: 1.15rem;
        padding: 16px 32px;
    }
}
</style>

<div class="registration-container">
    <h2 class="registration-title">Регистрация</h2>

    <form action="query.php" method="post" id="registrationForm">
        <input type="hidden" name="redistr" value="register">

        <div class="form-group">
            <label for="IDlogin" class="form-label">Логин</label>
            <input type="text" name="login" id="IDlogin" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="IDemail" class="form-label">Email</label>
            <input type="email" name="email" id="IDemail" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="IDpassword" class="form-label">Пароль</label>
            <input type="password" name="password" id="IDpassword" class="form-control" required minlength="6">
        </div>

        <button type="submit" class="btn-register">Зарегистрироваться</button>
    </form>
</div>

<script>
document.getElementById('registrationForm').addEventListener('submit', function(e) {
    const password = document.getElementById('IDpassword').value;
    if (password.length < 6) {
        e.preventDefault();
        alert('Пароль должен содержать не менее 6 символов');
        return false;
    }
});
</script>

<?php require('footer.html'); ?>