<?php
use core\App;
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Logowanie - Wejdź do systemu</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .login-form {
            background: rgba(255,255,255,0.95);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 380px;
            backdrop-filter: blur(10px);
        }
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 10px;
        }
        .logo p {
            color: #666;
            font-size: 14px;
        }
        .form-group {
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
            font-size: 14px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 15px;
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s;
            background: rgba(255,255,255,0.8);
        }
        input[type="text"]:focus, input[type="password"]:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 15px rgba(102,126,234,0.3);
            background: white;
        }
        .submit-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102,126,234,0.4);
        }
        .errors {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 10px;
            margin-top: 20px;
            border: 1px solid #f5c6cb;
        }
        .errors ul {
            margin: 0;
            padding-left: 20px;
            list-style: none;
        }
        .errors li:before {
            content: "⚠️ ";
        }
    </style>
</head>
<body>
    <form action="<?php echo App::getConf()->app_url; ?>/login" method="post" class="login-form">
        <div class="logo">
            <h1>🔐 Logowanie</h1>
            <p>Proszę podaj swoje dane</p>
        </div>
        
        <div class="form-group">
            <label for="id_login">👤 Login:</label>
            <input id="id_login" type="text" name="login" value="<?php echo htmlspecialchars($form->login ?? ''); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="id_pass">🔑 Hasło:</label>
            <input id="id_pass" type="password" name="pass" required>
        </div>
        
        <button type="submit" class="submit-btn">Zaloguj się ➤</button>

        <?php if (isset($messages) && !$messages->isEmpty()): ?>
            <div class="errors">
                <ul>
                    <?php foreach ($messages->getMessages() as $msg): ?>
                        <li><?php echo htmlspecialchars(is_object($msg) ? ($msg->text ?? (string)$msg) : $msg); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </form>
</body>
</html>
