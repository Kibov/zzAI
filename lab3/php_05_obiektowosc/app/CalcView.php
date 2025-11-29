<?php
require_once dirname(__DIR__).'/config.php';
$role = $_SESSION['role'] ?? '';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Moj Kalkulator Kredytowy</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .kalkulator {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 400px;
        }
        h1 { 
            text-align: center; 
            color: #333; 
            margin-bottom: 20px;
            font-size: 24px;
        }
        .info {
            background: #f0f8ff;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #007bff;
        }
        .buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        .btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            text-align: center;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }
        .btn-primary { background: #007bff; color: white; }
        .btn-primary:hover { background: #0056b3; }
        .btn-danger { background: #dc3545; color: white; }
        .btn-danger:hover { background: #c82333; }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
        }
        input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
        }
        input[type="number"]:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0,123,255,0.3);
        }
        .submit-btn {
            width: 100%;
            padding: 15px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }
        .submit-btn:hover {
            background: #218838;
        }
        .errors {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
        }
        .errors ul { margin: 0; padding-left: 20px; }
        .result {
            background: #d4edda;
            color: #155724;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            border: 1px solid #c3e6cb;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="kalkulator">
        <h1>💰 Kalkulator Kredytu</h1>
        <div class="info">
            Zalogowany: <strong><?php echo htmlspecialchars($role); ?></strong>
        </div>
        
        <div class="buttons">
            <a href="#" class="btn btn-primary">📋 Inna strona</a>
            <a href="<?php print ($conf->app_root); ?>/app/security/logout.php" class="btn btn-danger">🚪 Wyloguj</a>
        </div>

        <form method="post">
            <div class="form-group">
                <label>💵 Kwota kredytu (PLN):</label>
                <input type="number" name="amount" step="0.01" value="<?php echo htmlspecialchars($form->amount ?? ''); ?>" required>
            </div>
            <div class="form-group">
                <label>📅 Okres spłaty (lata):</label>
                <input type="number" name="years" step="0.1" value="<?php echo htmlspecialchars($form->years ?? ''); ?>" required min="0.1">
            </div>
            <div class="form-group">
                <label>📈 Oprocentowanie roczne (%):</label>
                <input type="number" name="rate" step="0.01" value="<?php echo htmlspecialchars($form->rate ?? ''); ?>" required min="0">
            </div>
            <button type="submit" class="submit-btn">🔢 OBLICZ RATĘ ➤</button>
        </form>

        <?php if (!empty($messages)): ?>
            <div class="errors">
                <ul>
                    <?php foreach ($messages as $m): ?>
                        <li><?php echo htmlspecialchars($m); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if (!empty($result->monthlyPayment)): ?>
            <div class="result">
                Miesięczna rata: <?php echo number_format($result->monthlyPayment, 2); ?> PLN 💳
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
