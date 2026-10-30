<?php
// KONTROLER strony przelicznika walut
require_once dirname(__FILE__).'/../config.php';

// 1. Pobranie parametrów
$amount = $_REQUEST['amount'] ?? null;
$currency = $_REQUEST['currency'] ?? null;

// Kursy przeliczeniowe względem PLN
$rates = [
    'EUR' => 4.30,
    'USD' => 4.00,
    'GBP' => 5.10,
    'CHF' => 4.50
];

// 2. Walidacja parametrów z przygotowaniem zmiennych dla widoku
if (!isset($amount) || !isset($currency)) {
    $messages[] = 'Błędne wywołanie aplikacji. Brak wymaganych parametrów.';
}

if ($amount == "") {
    $messages[] = 'Nie podano kwoty do przeliczenia.';
}

if (empty($messages)) {
    if (!is_numeric($amount) || $amount <= 0) {
        $messages[] = 'Kwota musi być dodatnią liczbą.';
    }
    
    if (!array_key_exists($currency, $rates)) {
        $messages[] = 'Wybrano nieobsługiwaną walutę.';
    }
}

// 3. Wykonanie obliczeń
if (empty($messages)) {
    $amount = floatval($amount);
    $rate = $rates[$currency];
    
    // Przeliczenie kwoty PLN na wybraną walutę
    $result = round($amount / $rate, 2);
}

// 4. Wywołanie widoku
include 'calc_view.php';