<?php
    if (isset($_POST['enviar'])) {
        include '../mysql/mysqli.class.php';
        $DB = new my_mysqli;
        if ($DB->Connect("dalferinox")) {
            $usuario = htmlentities($_POST['usuario']);
            $senha = htmlentities($_POST['senha']);
            $sql = "Select * FROM usuario where nome = '$usuario' and senha = '$senha'";
            $query = $DB->Query($sql);
            $qtde = $DB->FetchNum($query);
            if ($qtde>0) {
                $linha = $DB->FetchArray($query);
                session_start();
                $_SESSION["usuario"] = $usuario;
                $_SESSION["acesso"] = $linha["acesso"];
                header("Location: home.php");
            }
            else {
                echo "<div class=\"row\"><div class=\"medium-2 large-centered columns\">
                        <span class=\"label alert round\">Usuario ou Senha invalido !</span>
                        </div></div>";
            }
        }
        else {
            $DB->Mensagem();
        }
        $DB->Close();
    }    
?>

<!DOCTYPE html> 
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]--> 
<html class="no-js" lang="en" > 
<head> 
  <meta charset="utf-8"> 
  <!-- If you delete this meta tag World War Z will become a reality --> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Dalferinox</title> 
  <!-- If you are using the CSS version, only link these 2 files, you may add app.css to use for your overrides if you like --> 
  <link rel="stylesheet" href="../foundation/css/normalize.css"> 
  <link rel="stylesheet" href="../foundation/css/foundation.css"> 

  <script src="../foundation/js/vendor/modernizr.js"></script> 
</head> 
<body>
    <form id="form1" name="form1" method="post" action="index.php">
        <div class="row">
            <div class="medium-12 columns">
                <h1 align="center">Dalferinox</h1>
            </div>
        </div>
        <div class="panel">
            <div class="row collapse">
                <div class="medium-2 columns">
                    <label class="prefix">Usuario</label>
                </div>
                <div class="medium-10 columns">
                    <input type="text" name="usuario" id="usuario" placeholder="Digite o nome do usuario" />
                </div>
            </div>
            <div class="row collapse">
                <div class="medium-2 columns">
                    <label class="prefix">Senha</label>
                </div>
                <div class="medium-8 columns">
                    <input type="password" name="senha" id="senha" placeholder="Digite a senha" />
                </div>
                <div class="medium-2 columns">
                    <input class="button postfix" name="enviar" type="submit" value="Enviar" />
                </div>
            </div>
        </div>
    </form>
    <script src="../foundation/js/vendor/jquery.js"></script>
    <script src="../foundation/js/foundation.min.js"></script>
    <script> $(document).foundation(); </script>
</body>
</html>
