<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Agendando... </title>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="estilo.min.css" />
        <link href = "https://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet"/>
    </head>
    <body>
        <?php
            $nome=$_POST["nome"];
            $email=$_POST["email"];
            $telefone=$_POST["telefone"];
            $data_agendamento=$_POST["data_agendamento"];
            $hora=$_POST["hora"];
            $aux=0;

            if(!file_exists("agenda.xml")){
                $xml=
"<?xml version=\"1.0\" encoding=\"UTF-8\"?>
    <agenda>
        <agendamento>
            <nome>$nome</nome>
            <email>$email</email>
            <telefone>$telefone</telefone>
            <data_agendamento>$data_agendamento</data_agendamento>
            <hora>$hora</hora>
        </agendamento>
    </agenda>";

                file_put_contents("agenda.xml", $xml);

                echo'
                    <div class="mensagem col-sm-6 offset-sm-3 col-md-4 offset-md-4">
                        <h2 class = "text-center" style="color:black;"> Agendamento realizado com sucesso </h2>
                        <div class="float-right">
                            <a href="lista_agendamento.php" class="btn btn-outline-danger" role="button"> Consultar agenda </a>
                        </div>
                        <br/>
                    </div>
                ';
            }
            else{
                $agenda=simplexml_load_file("agenda.xml");
                foreach($agenda->children() as $agendamento){
                    if($_POST["data_agendamento"]==$agendamento->data_agendamento && $_POST["hora"]==$agendamento->hora){
                        $aux=1;
                    }
                }
                if($aux==0){
                    $agenda=simplexml_load_file("agenda.xml");
                    $agendamento=$agenda->addChild("agendamento");

                    $agendamento->addChild("nome", $nome);
                    $agendamento->addChild("email", $email);
                    $agendamento->addChild("telefone", $telefone);
                    $agendamento->addChild("data_agendamento", $data_agendamento);
                    $agendamento->addChild("hora", $hora);

                    file_put_contents("agenda.xml", $agenda->asXML());

                    echo'
                        <div class="mensagem col-sm-6 offset-sm-3 col-md-4 offset-md-4">
                            <h2 class = "text-center" style="color:black;"> Agendamento realizado com sucesso </h2>
                            <div class="float-right">
                                <a href="lista_agendamento.php" class="btn btn-outline-danger" role="button"> Consultar agenda </a>
                            </div>
                            <br/>
                        </div>
                    ';
                }
                else{
                    echo'
                        <div class="mensagem col-sm-6 offset-sm-3 col-md-4 offset-md-4">
                            <h2 class = "text-center" style="color:black;"> Já existe cliente agendado no horário selecionado </h2>
                            <div class="float-right">
                                <a href="form_agendamento.php" class="btn btn-outline-danger" role="button"> Tentar novamente </a>
                            </div>
                            <br/>
                        </div>
                    ';
                }
            }
        ?>
    </body>
</html>
