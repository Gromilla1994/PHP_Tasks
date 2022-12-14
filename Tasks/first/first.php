<?php

// значение взял из головы
$a = 33;

// массив с числами также взятыми из головы
$arr = [16, 12, 14, 33, 62, 85, 15, 64, 24, 123];

// длинна массива
$len = count($arr);

for($i = 0; $i < $len; $i++)
{
    // для удобства и чистоты кода
    $current_number =  (string)$arr[$i];
    
    // проверка на то, есть ли в текущем элементе "2"
    if(strpos($current_number, "2") !== false)
    {
        // увеличиваем длину на 1, тк будем сдвигать массив
        $len++;

        for($j = $len-1; $j > $i; $j--)
        {
            // j - новый элемент массива, который будет равен предыдущему
            // по такому принципу сдвигаем массив вправо
            $arr[$j] = $arr[$j - 1];   
        }
        
        // увеличиваем $i на 1, чтобы цикл не был бесконечным, а также
        // чтобы перескочить элемент $a
        $i++;

        // добавляем $a в массив
        $arr[$i] = $a;
    }
}      

// выводим массив
foreach($arr as $number)
{
    echo $number . " -- ";
}
?>