<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Perfil do Cadastro</title>
    <style>
        .dadosPessoais {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .dadosPessoais div {
            margin-bottom: 20px;
        }

        /*Define Fonte para todas as tags listadas abaixo*/
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Montserrat", sans-serif
        }
    </style>
</head>

<body class="w3-light-grey">

    <?php
    include_once '../Model/Usuario.php';
    include_once '../Controller/FormacaoAcadController.php';
    include_once '../Controller/ExperienciaProfissionalController.php';
    include_once '../Controller/OutrasFormacoesController.php';
    include_once '../Controller/UsuarioController.php';

    if (!isset($_SESSION)) {
        session_start();
    }
    // Verifique se o value ID do usuário está presente na URL do btnPerfil
    if (isset($_POST['id'])) {
        $userId = $_POST['id'];
        // Criar uma instância da classe UsuarioController
        $usuarioController = new UsuarioController();
        // Buscar os dados do usuário com base no ID
        $usuario = $usuarioController->buscarUsuarioPorID($userId);
    }
    ?>
    <!--Cabeçalho -->
    <header>
        <div>
            <h1 class="w3-round-xlarge w3-cyan w3-text-white w3-center w3-padding-32"><?php echo $usuario->getNome(); ?> Currículo</h1>
        </div>
    </header>

    <main>
        <div class="dadosPessoais"><!--Dados pessoais -->
            <div class="w3-padding w3-round-xlarge w3-content w3-row w3-cyan w3-text-white">
                <h2>NOME: <?php echo $usuario->getNome(); ?></h2>
            </div>
            <div class="w3-padding w3-round-xlarge w3-content w3-row w3-cyan w3-text-white">
                <h2>CPF: <?php echo $usuario->getCPF(); ?></h2>
            </div>
            <div class="w3-padding w3-round-xlarge w3-content w3-row w3-cyan w3-text-white">
                <h2>EMAIL: <?php echo $usuario->getEmail(); ?></h2>
            </div>
            <div class="w3-padding w3-round-xlarge w3-content w3-row w3-cyan w3-text-white">
                <h2>DATA DE NASCIMENTO: <?php echo $usuario->getDataNascimento(); ?></h2>
            </div>
        </div>

        <!--Formação -->
        <div class="w3-padding-128 w3-content w3-text-grey">
            <h2 class="w3-text-cyan w3-center">Formação</h2>

            <div class="w3-container" style="margin-bottom: 50px;">
                <table class="w3-table-all w3-centered">
                    <thead>
                        <tr class="w3-center w3-blue">
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <thead>
                        <?php
                        $fCon = new FormacaoAcadController();
                        $results = $fCon->gerarLista($usuario->getID());
                        if ($results != null)
                            while ($row = $results->fetch_object()) {
                                echo '<tr>';
                                echo '<td style="width: 15%;">' . $row->inicio . '</td>';
                                echo '<td style="width: 15%;">' . $row->fim . '</td>';
                                echo '<td style="width: 65%;">' . $row->descricao . '</td>';
                                echo '</tr>';
                            }
                        ?>
                    </thead>
                </table>
            </div>
        </div>

        <!--Experiência Profissional -->
        <div class="w3-padding-128 w3-content w3-text-grey">
            <h2 class="w3-text-cyan w3-center">Experiência Profissional</h2>

            <div class="w3-container" style="margin-bottom: 50px;">
                <table class="w3-table-all w3-centered">
                    <thead>
                        <tr class="w3-center w3-blue">
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Empresa</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <thead>
                        <?php
                        $ePro = new ExperienciaProfissionalController();
                        $results = $ePro->gerarLista($usuario->getID());
                        if ($results != null)
                            while ($row = $results->fetch_object()) {
                                echo '<tr>';
                                echo '<td style="width: 15%;">' . $row->inicio . '</td>';
                                echo '<td style="width: 15%;">' . $row->fim . '</td>';
                                echo '<td style="width: 15%;">' . $row->empresa . '</td>';
                                echo '<td style="width: 55%;">' . $row->descricao . '</td>';
                                echo '</tr>';
                            }
                        ?>
                    </thead>
                </table>
            </div>
        </div>

        <!--Outras Formações -->
        <div class="w3-padding-128 w3-content w3-text-grey">
            <h2 class="w3-text-cyan w3-center">Outras Formações</h2>

            <div class="w3-container" style="margin-bottom: 50px;">
                <table class="w3-table-all w3-centered">
                    <thead>
                        <tr class="w3-center w3-blue">
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <thead>
                        <?php
                        $ofCon = new OutrasFormacoesController();
                        $results = $ofCon->gerarLista($usuario->getID());
                        if ($results != null)
                            while ($row = $results->fetch_object()) {
                                echo '<tr>';
                                echo '<td style="width: 15%;">' . $row->inicio . '</td>';
                                echo '<td style="width: 15%;">' . $row->fim . '</td>';
                                echo '<td style="width: 65%;">' . $row->descricao . '</td>';
                            }
                        ?>
                    </thead>
                </table>
            </div>
        </div>
    </main>
    <div class="w3-padding-128 w3-content w3-text-grey">
        <form action="/Controller/Navegacao.php" method="post" class="w3-container w3-light-grey w3-textblue w3-margin w3-center" style="width: 30%;">
            <div class="w3-row w3-section">
                <div>
                    <button name="btnVoltarLista" class="w3-button w3-block w3-margin w3-red w3-cell w3-roundlarge" style="width: 90%;">
                        Voltar
                    </button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>