<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Przelicznik Walut</title>
</head>
<body>

<h2>Przelicznik PLN na waluty obce</h2>

 <!-- Formularz -->
<form action="<?php print(_APP_URL);?>/app/calc.php" method="get">
    <label for="id_amount">Kwota w PLN: </label>
    <input id="id_amount" type="text" name="amount" value="<?php echo isset($amount) ? htmlspecialchars($amount) : ''; ?>" /><br /><br />
    
    <label for="id_currency">Docelowa waluta: </label>
    <select id="id_currency" name="currency">
        <option value="EUR" <?php if (isset($currency) && $currency == 'EUR') echo 'selected'; ?>>EUR (Euro)</option>
        <option value="USD" <?php if (isset($currency) && $currency == 'USD') echo 'selected'; ?>>USD (Dolar)</option>
        <option value="GBP" <?php if (isset($currency) && $currency == 'GBP') echo 'selected'; ?>>GBP (Funt)</option>
        <option value="CHF" <?php if (isset($currency) && $currency == 'CHF') echo 'selected'; ?>>CHF (Frank)</option>
    </select><br /><br />
    
    <input type="submit" value="Przelicz" />
</form>	

<?php
// Wyświetlenie listy błędów
if (isset($messages) && count($messages) > 0) {
    echo '<ol style="margin: 20px 0; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
    foreach ($messages as $msg) {
        echo '<li>'.$msg.'</li>';
    }
    echo '</ol>';
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px 0; padding: 10px; border-radius: 5px; background-color: #d4edda; border: 1px solid #c3e6cb; width:300px;">
    <?php echo $amount . ' PLN = <strong>' . $result . ' ' . $currency . '</strong>'; ?>
</div>
<?php } ?>

</body>
</html>