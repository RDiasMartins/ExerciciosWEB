<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Jogo da Velha </title>
        <style>
            input{text-align: center; border:5px solid black; width: 200px; height: 200px; font-size:100px;}
            table{border: 1px solid black; border-radius:5px; width: 200px; height: 200px;}
            h2{color:white; font-family:consolas; font-size:50px;}
            body{background-color:black;}
        </style>
        <script>
            var contador=0;
            var jogadorGanhador='';
            function valida_sequencia(x,y,z){
                if(x=="" || y=="" || z==""){
                    return false;
                }

                if(x==y && z==y){
                    jogadorGanhador=x;
                    return true;
                }
                else{
                    return false;
                }
            }

            function valida_jogo(){
                campo1=document.getElementById("campo1").value;
                campo2=document.getElementById("campo2").value;
                campo3=document.getElementById("campo3").value;
                campo4=document.getElementById("campo4").value;
                campo5=document.getElementById("campo5").value;
                campo6=document.getElementById("campo6").value;
                campo7=document.getElementById("campo7").value;
                campo8=document.getElementById("campo8").value;
                campo9=document.getElementById("campo9").value;

                if(valida_sequencia(campo1, campo2, campo3) || valida_sequencia(campo4, campo5, campo6) ||
                    valida_sequencia(campo7, campo8,campo9) || valida_sequencia(campo1,campo5,campo9) ||
                    valida_sequencia(campo3, campo5, campo7)|| valida_sequencia(campo1,campo4,campo7)||
                    valida_sequencia(campo2,campo5,campo8) || valida_sequencia(campo3,campo6,campo9))
                {
                    alert("Ganhador: "+jogadorGanhador);
                }
                else if(contador==9){
                    alert("Deu velha!");
                }


            }

            function valida_jogada(valor){
                if(valor.value!=""){
                    contador++;

                    if(contador%2==0){
                        if(valor.value=="0"){
                            valor.value='0';
                            valor.setAttribute('readonly','readonly');

                            valida_jogo();

                        }
                        else{
                            alert('Não é sua vez');
                            valor.value='';
                            contador--;
                        }
                    }
                    else{
                        if(valor.value=="x"){
                            valor.value='X';
                            valor.setAttribute('readonly','readonly');
                            valida_jogo();

                        }
                        else{
                            alert('Não é sua vez');
                            valor.value='';
                            contador--;
                        }
                    }

                }
                else{
                    alert('Campo vazio');
                }
            }

        </script>
    </head>
    <body>
        <center>
            <i> <h2> JOGO DA VELHA </h2> </i>

            <form name='jogo'>
                <table border='1'>
                    <tr>
                        <td> <input type="text" id="campo1" onblur="valida_jogada(this);" maxlength="1"/>
                        <td> <input type="text" id="campo2" onblur="valida_jogada(this);" maxlength="1"/>
                        <td> <input type="text" id="campo3" onblur="valida_jogada(this);" maxlength="1"/>
                    </tr>
                    <tr>
                        <td> <input type="text" id="campo4" onblur="valida_jogada(this);" maxlength="1"/>
                        <td> <input type="text" id="campo5" onblur="valida_jogada(this);" maxlength="1"/>
                        <td> <input type="text" id="campo6" onblur="valida_jogada(this);" maxlength="1"/>
                    </tr>
                    <tr>
                        <td> <input type="text" id="campo7" onblur="valida_jogada(this);" maxlength="1"/>
                        <td> <input type="text" id="campo8" onblur="valida_jogada(this);" maxlength="1"/>
                        <td> <input type="text" id="campo9" onblur="valida_jogada(this);" maxlength="1"/>
                    </tr>
                </table>
            </form>
        </center>
    </body>
</html>
