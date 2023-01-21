<?php
    session_start();
    
    if($_SESSION['valid'] == false) {
        header("Location: loginPage.php");
    }

    $json_file = file_get_contents('metadata/graph.json');
    $localita = json_decode($json_file, true);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body class="gradient-custom">
    <section class="vh-100 gradisent-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Localita</h2>

                                <form method="post" action="AddRisultato.php">

    
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="nome">Nome</label>
                                        <input type="text" id="typeEmailX" class="form-control form-control-lg" name="nome" required/>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="cognome">Cognome</label>
                                        <input type="text" id="typeEmailX" class="form-control form-control-lg" name="cognome" required/>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="localita">Localita :</label>
                                         <!-- <select name="localita" id="localita" class="form-control form-control-lg">
                                            <?php foreach ($localita as $loc): ?>
                                            <option value="<?php echo $loc['localita'] ?>"><?php echo $loc['localita'] ?></option>
                                            <?php endforeach; ?>
                                        </select>-->

                                        <select name="localita" id="localita" class="form-control form-control-lg">
                                            <option value="Mare">Mare</option>
                                            <option value="Montagna">Montagna</option>
                                        </select>
                                        </div>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

                                    <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                        <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                        <a href="#!" class="text-white"><i
                                                class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                        <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                    </div>

                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>