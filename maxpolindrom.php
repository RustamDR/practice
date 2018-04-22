<?php

function maxPolindrom(string $str): string {
    $result = '';
    for ($left = (int)(strlen($str) / 2), $right = $left + 1; $left > 1; $left--, $right++) {
        $foundLeft = searchIn($str, $left); // Ищем слева
        $found = searchIn($str, $right); // Ищем справа
        
        $found = strlen($foundLeft) > strlen($found) ? $foundLeft : $found; // Берем макс слева или справа
        $result = strlen($found) > strlen($result) ? $found : $result; // Если результат меньше, то берем новый найденный
    }
    
    return $result;
}

//Поиск макс полиндрома от заданного центра полиндрома в строке 
function searchIn($str, $polindromCenter): string {
    $found = '';
    $maxLen = 0;
    for ($d = 0; $d <= 1; $d++) {
        for ($right = $polindromCenter, $left = $polindromCenter - $d; $right < strlen($str); $right++, $left--)
            if ($str[$right] !== $str[$left]) break;
        
        $newLen = $right - $left - 1;
        if ($newLen > 1 && $maxLen < $newLen) {
            $maxLen = $newLen;
            $found = substr($str, $left + 1, $newLen);
        }
    }
    
    return $found;
}
