


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    
    <link rel="stylesheet" type="text/css" href="/css/stylecadastro.css">
</head>
<body>
    <div id="area">
        <form id="cadastro" autocomplete="off" action="cadastrar_paciente.php" method="POST">//colocar no action:cadastrar_paciente.php
            <fieldset>
                <legend><b>Cadastro</b></legend>

                <br>

                <div class="classenome">
                    <label id="nome" for="floatingInput" class="inputAnimacao">Nome Completo</label>
                    <br>
                    <input id="nome" type="name" class="form-control" id="floatingInput" placeholder="" name="nome_completo">   
                </div>

                <br>

                <div class="classecpf">
                    <label id="cpf" for="floatingInput" class="inputAnimacao">CPF</label>
                    <br>
                    <input id="cpf" type="cpf" class="form-control" id="floatingInput" placeholder="111-111-111.11"name="cpf" maxlength="11" oninput="validar(this)">
                </div>

                <br>

                <div class="classeSenha">
                    <label id="senha" for="floatingInput" class="inputAnimacao">Senha</label>
                    <br>
                    <input id="senha" type="senha" class="form-control" id="floatingInput" placeholder="" name="senha">
                </div>

                <br>

                <div class="classeConfirmaSenha">
                    <label id="confirma_senha" for="floatingInput" class="inputAnimacao">Confirma Senha</label>
                    <br>
                    <input id="confirma_senha" type="confirma_senha" class="form-control" id="floatingInput" placeholder="" name="confirma_senha">
                </div>

                <br>

                <div class="classeCarteirinhaSUS">
                    <label id="carteirinha_sus" for="floatingInput" class="inputAnimacao">Carteirinha SUS</label>
                    <br>
                    <input id="carteirinha_sus" type="carteirinha_sus" class="form-control" id="floatingInput" placeholder="" name="carteirinha_sus">
                </div>

                <br>

                <div class="classeTel">
                    <label id="tel" for="floatingInput" class="inputAnimacao">Telefone</label>
                    <br>
                    <input id="tel" type="tel" class="form-control" id="floatingInput" placeholder="(XX)9XXXX-XXXX" name="telefone" maxlength="11">
                </div>

                <br>

                <div class="classeEMAIL">
                    <label id="email" for="floatingInput" class="inputAnimacao">Email</label>
                    <br>
                    <input id="email" type="email" class="form-control" id="floatingInput" placeholder="seuemail@gmail.com" name="email">
                </div>

                <br>
              
                <div class="classeData">
                    <label id="date" for="data_nascimento">Data de Nascimento</label>
                    <br>
                    <input type="date" id="data_nascimento" placeholder="DIA/MÊS/ANO" name="data_nascimento">//tranformar em ano/mes/dia oxi
                </div>

                <br>

                
                <div class="classeEndereço">
                    <label id="endereço" for="floatingInput" class="inputAnimacao">Endereço</label>
                    <br>
                    <input id="endereço" type="endereço" class="form-control" id="floatingInput" placeholder="" name="endereco">
                </div>

                <br>

                <div class="classeBairro">
                    <label id="bairro" for="floatingInput" class="inputAnimacao">Bairro</label>
                    <br>
                    <input id="bairro" type="bairro" class="form-control" id="floatingInput" placeholder="" name="bairro">
                </div>

                <div class="classeNum">
                    <label id="numeroEndereco" for="floatingInput" class="inputAnimacao">Número do Endereço</label>
                    <br>
                    <input id="numeroEndereco" type="num" class="form-control" id="floatingInput" placeholder="" name="numero">
                </div>

                <br>

                <div class="classecep">
                    <label id="cep" for="floatingInput" class="inputAnimacao">CEP</label>
                    <br>
                    <input id="cep" type="cep" class="form-control" id="floatingInput" placeholder="XXXXX-XXX" name="cep" maxlength="8">
                </div>

                <br>

                <div class="classeCidade">
                    <label id="cidade" for="floatingInput" class="inputAnimacao">Cidade</label>
                    <br>
                    <input id="cidade" type="city" class="form-control" id="floatingInput" placeholder="" name="cidade">
                </div>

                <br>

                <div class="classeEstado">
                    <label id="estado" for="floatingInput" class="inputAnimacao">Estado</label>
                    <br>
                    <input id="estado" type="state" class="form-control" id="floatingInput" placeholder="" name="estado"> <!--da pra botar isso com o bagulho da caixinha de selecionar-->
                </div>

                <br>
                

                <input  id="bCadastrar submit" class="btn btn-primary" type="submit" name="submit">Cadastrar</input>
                

            </fieldset>
        </form>

        <script src="../js/index.js"></script>
</body>
</html>