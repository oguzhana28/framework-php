<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Studenten app</title>
    <link rel="stylesheet" href="<?= URL ?>">
</head>

<body>

    <?php 
    if ( isset($message) == true ) {
        if  (strlen(trim($message))>0 ) { 
            echo "<div style='color:red'>" . $message . "</div>"; 
        }
    }