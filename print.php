<?php

function strToHex($string) {
	$hex = '';

	for ($i = 0; $i < strlen($string); $i++) {
		$ord = ord($string[$i]);
		$hexCode = dechex($ord);
		$hex .= substr('0' . $hexCode, -2);
	}

	return strToUpper($hex);
}

function hexToStr($hex) {
	$string = '';

	for ($i = 0; $i < strlen($hex) - 1; $i += 2) {
		$string .= chr(hexdec($hex[$i] . $hex[$i + 1]));
	}

	return $string;
}

// Create plain receipt data below
$header = "";

$header .= "HOTLINE/FAX: 021 8833 6059\n";
$header .= "SMS: +62 8121284777\n";
$header .= "NAMA PETUGAS: PGB001\n";
$header .= "2017-01-01 01:01:01\n";

$content = "";

$content .= "TGL BRKT      : 01-01-2018    \n";
$content .= "JAM BRKT      : 15:00         \n";
$content .= "KD PERJALANAN : PGBWSB.X1.1545\n";
$content .= "KELAS         : EXECUTIVE     \n";
$content .= "NO KURSI      : 39            \n";
$content .= "NAMA          : TEST          \n";
$content .= "ASAL          : PULO GEBANG   \n";
$content .= "TUJUAN        : WONOSOBO      \n";
$content .= "TARIF         : 120,000.00    \n";
$content .= "TURUN         : BANJARNEGARA  \n";
$content .= "NOPOL         : 7621 TGC      \n";

$footer = "";

$footer .= "PEMEGANG TIKET DIANGGAP TELAH\n";
$footer .= "MENGETAHUI DAN WAJIB MEMENUHI\n";
$footer .= "KETENTUAN DAN PERATURAN\n";
$footer .= "SINAR JAYA GROUP\n";
$footer .= "MOHON HADIR 30 MENIT\n";
$footer .= "SEBELUM JADWAL KEBERANGKATAN\n";

// Convert all data to hex;
$h = strToHex($header);
$c = strToHex($content);
$f = strToHex($footer);

// QR Code, printed at bottom of receipt
$q = strToHex("PGBWSB.X1.1545");

$response = [ 
	'h' => $h,
	'c' => $c,
	'f' => $f,
	'q' => $q
];

header('Content-Type: application/json');
echo json_encode($response);

?>
