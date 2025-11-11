<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

include _ROOT_PATH.'/app/security/check.php';

// 1. pobranie parametrów

function getParams(&$x,&$y,&$years){
	$x = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
	$y = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
	$years = isset($_REQUEST['years']) ? $_REQUEST['years'] : null;	
}

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

function validate(&$x,&$y,&$years,&$messages){
	// sprawdzenie, czy parametry zostały przekazane
	if ( ! (isset($x) && isset($y) && isset($years))) {
		// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
		// teraz zakładamy, ze nie jest to błąd. Po prostu nie wykonamy obliczeń
		return false;
	}

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $x == "") {
		$messages [] = 'Nie podano kwoty';
	}
	if ( $y == "") {
		$messages [] = 'Nie podano oprocentowania';
	}

	//nie ma sensu walidować dalej gdy brak parametrów
	if (count ( $messages ) != 0) return false;
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $x )) {
		$messages [] = 'Kwota nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $y )) {
		$messages [] = 'Oprocentowanie nie jest liczbą całkowitą';
	}	

	if (count ( $messages ) != 0) return false;
	else return true;
}


// 3. wykonaj zadanie jeśli wszystko w porządku

function process(&$x,&$y,&$years,&$messages,&$result){
	global $role;
	
	//konwersja parametrów na int
	if($role == 'user'){
		$x = intval($x);
		$y = intval($y);
		
		$x = intval($x);
		$y = intval($y);
		$years = intval($years);
	
		$monthRate = floatval($y) / 12 / 100;

		$installments = $years * 12;

		$calculated = $x * ($monthRate * pow(1 + $monthRate, $installments) / (pow(1 + $monthRate,$installments) - 1));

		$result = round($calculated, 2);
	}
}

//definicja zmiennych kontrolera
$x = null;
$y = null;
$years = null;
$result = null;
$messages = array();

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($x,$y,$years);
if ( validate($x,$y,$years,$messages) ) { // gdy brak błędów
	process($x,$y,$years,$messages,$result);
}
include 'calc_view.php';