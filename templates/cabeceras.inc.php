<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width,
        initial-scale=1" name="viewport">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

    <?php
    if (isset($estilosWeb)) {
        foreach ($estilosWeb as $estilo) {
            echo '<link href="' . $estilo . '" rel="stylesheet" type="text/css">';
        }
    }
    ?>

    <title><?php echo $tituloPagina ?></title>
</head>

<body class="app">