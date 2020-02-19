<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title> Barbearia </title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="estilo.min.css" />
    <link href = "https://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet"/>
</head>
<body>
    <div class="container">
        <center>
            <div class="caixa">
                <h2> Agendamento </h2>
                <hr>
                <form action="recebe_agendamento.php" method="POST">
                    <p>
                        <input type="text" name="nome" class="form-control"  placeholder="Nome"/>
                    </p>
                    <p>
                        <input type="text" name="email" class="form-control"  placeholder="exemplo@dominio.com"/>
                    </p>
                    <p>
                        <input type="text" maxlength="8" name="telefone" class="form-control"  placeholder="Telefone"/>
                    </p>
                    <p>
                        <input type="date" class="form-control"  name="data_agendamento"/>
                    </p>
                    <p>
                        <input type="time" class="form-control"  name="hora"/>
                    </p>
                    <div class="float-right">
                        <a href="lista_agendamento.php" class="btn btn-outline-danger" role="button"> Consultar agenda </a>
                        <button type="submit" class="btn btn-outline-primary">
                            Agendar
                        </button>
                    </div>
                    <br/><br/>
                </form>
            </div>
        </center>
    </div>
</body>
</html>
