<?php
$json_file = file_get_contents('test.json');
$localita = json_decode($json_file, true);

$nome = $_POST['nome'];
$localita_post = $_POST['localita'];


if(preg_match("[\d]",$nome)) {
    header("Location: votePage.php");
}
else if(preg_match("[\d]",$nome)) {
    header("Location: votePage.php");
}
else {
    $localita[] = ['nome' => $nome, 'localita' => $localita_post];

    $json_file_new = json_encode($localita);
    file_put_contents('metadata/graph.json', $json_file_new);

    header("Location: chartPage.php");
}

?>