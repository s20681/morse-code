<?php
$dictionary = array(
    'A' => 0,
    'B' => 1,
    'C' => 2,
    'D' => 3,
    'E' => 4,
    'F' => 5,
    'G' => 6,
    'H' => 7,
    'I' => 8,
    'J' => 9,
    'K' => 10,
    'L' => 11,
    'M' => 12,
    'N' => 13,
    'O' => 14,
    'P' => 15,
    'Q' => 16,
    'R' => 17,
    'S' => 18,
    'T' => 19,
    'U' => 20,
    'V' => 21,
    'W' => 22,
    'X' => 23,
    'Y' => 24,
    'Z' => 25,
);

function vingenereLoop($dictionary, $message, $key, $decrypt){
    $result = "";
    $func = 'vingenereEncryption';
    if($decrypt){
        $func = 'vingenereDecryption';
    }

    foreach (range(0, strlen($message)-1) as $i){
        $index = $func($dictionary[$message[$i]], $dictionary[$key[$i]]);
        $result = $result.array_flip($dictionary)[$index];
    }
    echo $result;
}

function vingenereEncryption($litera, $klucz){
    $result = ($litera + $klucz) % 26;
    return $result;
}

function vingenereDecryption($litera, $klucz){
    $result = abs($litera - $klucz) % 26;
    return $result;
}

function generateKey($message, $key){
    $times = ceil(strlen($message) / strlen($key));
    $result = str_repeat($key, $times);
    return substr($result, 0, strlen($message));
}

////A + L == L
//vingenereEncryption(0, 11);
//
////T + E == X
//vingenereEncryption(19, 4);

$message = "ATTACKATDAWN";
$keyword = "LEMON";
$key = generateKey($message, $keyword);
vingenereLoop($dictionary, $message, $key, false);

//function vingenereEncryption($message, $ciphertext){
//    echo "nothing.";
//}


