<?php
require_once dirname(__DIR__, 2) . '/config.php';
use core\Utils;
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Błąd 403 - Brak dostępu</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .error-card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            text-align: center;
            max-width: 450px;
            width: 100%;
        }
        .error-code {
            font-size: 80px;
            color: #ff4757;
            font-weight: bold;
            margin-bottom: 10px;
        }
        h1 { 
            color: #333; 
            margin-bottom: 20px;
            font-size: 28px;
        }
        p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 30px;
            font-size: 16px;
        }
        .admin-req {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            color: #856404;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 30px;
            font-weight: bold;
        }
        .buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
        }
        .btn {
            padding: 15px 25px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            transition: all 0.3s;
            flex: 1;
            max-width: 200px;
            text-align: center;
        }
        .btn-primary { 
            background: #007bff; 
            color: white; 
        }
        .btn-primary:hover { 
            background: #0056b3; 
            transform: translateY(-2px);
        }
        .btn-danger { 
            background: #dc3545; 
            color: white; 
        }
        .btn-danger:hover { 
            background: #c82333; 
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="error-card">
        <div class="error-code">403</div>
        <h1>❌ Brak dostępu</h1>
        <p>Ups! Nie masz uprawnień do tej strony. 😔</p>
        <div class="admin-req">
            Wymagana rola: <strong>ADMIN</strong> 🔐
        </div>
        <div class="buttons">
            <a href="<?php echo htmlspecialchars(Utils::relURL('calc')); ?>" class="btn btn-primary">⬅️ Wróć do kalkulatora</a>
            <a href="<?php echo htmlspecialchars(Utils::relURL('logout')); ?>" class="btn btn-danger">🚪 Wyloguj się</a>
        </div>
    </div>
</body>
</html>
