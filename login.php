<?php
// ВСЕ PHP-код ДО любого вывода
session_start();
require_once 'db.php';

$message = '';

// Обработка логики
if (isset($_POST['submit'])) {
    $name = trim($_POST['name'] ?? '');
    if ($name) {
        // Пример простого сохранения в БД (если у вас есть таблица, например, `notes`)
        // $stmt = $mysqli->prepare("INSERT INTO notes (name) VALUES (?)");
        // $stmt->bind_param("s", $name);
        // $stmt->execute();
        $message = 'Спасибо, ' . htmlspecialchars($name) . '! Ты сделал(а) мой день ярче 🌸';
    } else {
        $message = 'Пожалуйста, напиши своё имя 🥺';
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Моя милая страничка 💕</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', 'Comic Sans MS', 'Caveat', cursive;
            background: linear-gradient(135deg, #ffe6f2, #e6f7ff);
            color: #5a394c;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .container {
            background: white;
            border-radius: 24px;
            padding: 40px 30px;
            box-shadow: 0 10px 30px rgba(255, 182, 193, 0.4);
            max-width: 90%;
            width: 500px;
            position: relative;
        }

        .container::before {
            content: "🎀";
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 24px;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #ff69b4;
        }

        p {
            font-size: 18px;
            line-height: 1.5;
            margin-bottom: 25px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #ffb6c1;
            border-radius: 16px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus {
            border-color: #ff69b4;
        }

        button {
            background: #ff9ec8;
            color: white;
            border: none;
            padding: 12px 28px;
            font-size: 18px;
            border-radius: 20px;
            cursor: pointer;
            transition: background 0.3s;
            font-family: inherit;
            font-weight: bold;
        }

        button:hover {
            background: #ff69b4;
        }

        .message {
            background: #fff0f5;
            padding: 12px;
            border-radius: 12px;
            margin-top: 15px;
            font-weight: bold;
            color: #d81b60;
        }

        .footer {
            margin-top: 25px;
            font-size: 14px;
            color: #a9a9a9;
        }

        .emoji {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Привет, солнышко! ☀️</h1>
        <p>Напиши своё имя, и я пришлю тебе волшебное приветствие!</p>

        <form method="POST">
            <input type="text" name="name" placeholder="Твоё имя 💖" required>
            <br>
            <button type="submit" name="submit">Отправить 💌</button>
        </form>

        <?php if ($message): ?>
            <div class="message">
                <?= $message ?>
            </div>
        <?php endif; ?>

        <div class="footer">
            Сделано с любовью • 🐾
        </div>
    </div>

    <!-- Милый "парящий" элемент -->
    <div style="position: absolute; top: 20px; right: 20px; font-size: 24px;" class="emoji">☁️</div>
    <div style="position: absolute; bottom: 30px; left: 30px; font-size: 20px;" class="emoji">🍓</div>
</body>
</html>