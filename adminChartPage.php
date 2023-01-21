<?php

session_start();
if($_SESSION['valid'] == false) {
    header("Location: loginPage.php");
}

$json_file = file_get_contents('test.json');
$localita = json_decode($json_file, true);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafico</title>
    <link rel="stylesheet" href="style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body class="gradient-custom">
    <section class="vh-100 gradisent-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-22 col-md-18 col-lg-16 col-xl-15">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">

                                <div>
                                    <img src="chart.php" alt="Localita">
                                </div>
                                <div class="ex1" class="mb-md-5 mt-md-4 pb-5">
                                    <?php
                                    $keys = array_keys($localita);
                                    foreach ($keys as $key):
                                        echo '<br>'."Nome : " . $localita[$key]["nome"] . "         Localita : " . $localita[$key]["localita"] . '<br>';
                                        endforeach;
                                    ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>