<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador de Empréstimo</title>
    <style>
        body{
            background-color: green;
            text-align: center;
        }
        p,h3,h2{
            color: gold;
            font-size: 26px;
            font-style: italic;
        }
        img{
            width: 470px;
            position: absolute;
            left: 10px;
        }
    </style>
</head>
<body>
    <?php
        $cliente = $_POST['cliente']; //'s' para sim ou 'n' para não
        $valor = $_POST['valor'];//Valor do empréstimo
        $score = $_POST['score']; //Score do SERESA
        $parcela = $_POST['parcela']; //Número de Parcelas
        //$seguro = $_POST['seguro']; //Quer seguro desempregado

        if (isset($_POST['seguro'])) {
            $seguro = 49.90;
        } else {
            $seguro = 0;
        }

    if($cliente == "s"){
        $valor = $valor + $valor * ((0.03) * $parcela);
        $valor_total = $valor + $valor * 0.0038;
        $valor_parcela = $valor / $parcela;
        $juros = 0;
    } else {
        switch ($score) {
            case $score <= 299:
                $juros = 0.2;
                break;
                case $score <= 499:
                    $juros = 0.15;
                    break;
                    case $score <= 699:
                        $juros = 0.1;
                        break;
            default:
            $juros = 0.05;
                break;
        }
    }
    $valor = ($valor + $valor * ($juros * $parcela)) + 35;
    $valor_total = $valor + $valor * 0.0038;
    $valor_parcela = $valor / $parcela;
    ?>
<h2>Seja bem-vindo ao MyBank</h2>
<img src="imagem/bob.png" >
    <h3>Resultado da simulação</h3>
    <p>Valor das parcelas: R$ <?= number_format($valor_parcela, 2, ',', '.') 
    ?> </p>
    <p>Quantidade de parcelas: <?= $parcela ?> </p>
    <p>Juros: <?= $juros * 100 ?> % </p>
    <p>Valor total CET: R$ <?= number_format($valor_total, 2, ',', '.') ?> </p>
    <p>Fulano, vc está ferrado meu parceiro</p>
</body>
</html>