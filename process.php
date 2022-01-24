<?php

$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["uploadedName"]["name"]);
$fileType = pathinfo($targetFile,PATHINFO_EXTENSION);

$uploadSuccess = true; //pomocná  - označí nám chybu

//kontrola existence
if (file_exists($targetFile)) {
    echo "Soubor již existuje!<br/>";
    $uploadSuccess = false;
}

// Kontrola velikosti (vlastní limit)
if ($_FILES["uploadedName"]["size"] > 8 * 1024 * 1024) {
    echo "Soubor je příliš velký<br/>";
    $uploadSuccess = false;
}

$whitelistExtenstions = [ "jpg", "png", "jpeg", "mp3", "mp4" ];

// Kontrola typu – vždy WHITELIST
if(!in_array($fileType, $whitelistExtenstions)) {
    echo "Bohužel jsou podporovány jen soubory typů " . implode(", ", $whitelistExtenstions) . ".<br/>";
    $uploadSuccess = false;
}

// zkontrolujeme proměnnou, která by nesla chybu
if (! $uploadSuccess) {
    echo "Došlo k chybě uploadu";

// pokud je vše v pořádku, uložíme soubor trvale
} else {
    if (move_uploaded_file($_FILES["uploadedName"]["tmp_name"], $targetFile)) {
        echo "Soubor ". basename( $_FILES["uploadedName"]["name"]). " byl uložen.<br/>";

        displayUploadedFile($targetFile, $fileType);
    } else {
        echo "Bohužel došlo k chybě uploadu";
    }
}

function displayUploadedFile($filename, $type) {
    if ($type == "jpg" || $type == "png" || $type == "jpeg") {
        echo "<img src='$filename' />";
    }else if($type == "mp3"){
        echo "<audio controls>
                <source src='$filename' type='audio/mpeg'>
              </audio>";
    }else if($type == "mp4"){
        echo "<video controls>
                <source src='$filename' type='video/mp4'>
              </video>";
    }
}

