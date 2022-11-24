<?php
    // выполняем код только если файл был загружен
    if(key_exists("table", $_FILES))
    {
        //Читаем полученный файл
        $res = file_get_contents($_FILES['table']['tmp_name']); 

        //Разбиваем на массив  
        $lines = explode("\r", $res);
        
        for($i = 0; $i < count($lines); $i++)
        {
            // Получаю имя файла, в котором запятая разделитель
            $name = explode(",", $lines[$i])[0];

            // убираю лишние пробелы
            $name = trim($name);
            
            // получаю значение файла, в котором запятая разделитель
            $value = explode(",", $lines[$i])[1];
           
            $file = fopen("upload/" . $name, "w");
            fwrite($file, $value);
            fclose($file);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input name="table" type="file"/>
        <br><br>
        <input type="submit" value="Upload file!">
    </form>
    
</body>
</html>

