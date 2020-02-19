<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Agenda </title>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="estilo.min.css" />
        <link href = "https://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet"/>
    </head>
    <body>
        <?php
            if(file_exists("agenda.xml")){
                echo'<center>
                        <div class="caixa">
                            <h2> Agenda </h2>
                            <br/>
                    ';
                echo'
                    <table class="table table-light table-striped table-hover" width="50%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Data</th>
                                <th>Hora</th>
                            </tr>
                        </thead>
                        <tbody>
                ';
                $agenda=simplexml_load_file("agenda.xml");

                foreach($agenda->children() as $agendamento){
                    echo"<tr>
                            <td>$agendamento->nome</td>
                            <td>$agendamento->email</td>
                            <td>$agendamento->telefone</td>
                            <td>$agendamento->data_agendamento</td>
                            <td>$agendamento->hora</td>
                        </tr>";
                }

                echo'
                    </tbody>
                    </table>
                    <a href="form_agendamento.php" class="btn btn-outline-dark" role="button"> Realizar Agendamento </a>
                    </div>
                    </center>
                ';
            }
            else{
                echo'
                    <div class="mensagem col-sm-6 offset-sm-3 col-md-4 offset-md-4">
                        <h2 class = "text-center" style="color:black;"> Não há agendamentos cadastrados </h2>
                        <div class="float-right">
                            <a href="form_agendamento.php" class="btn btn-outline-danger" role="button"> Tentar novamente </a>
                        </div>
                        <br/>
                    </div>
                ';
            }
        ?>
    </body>
</html>
