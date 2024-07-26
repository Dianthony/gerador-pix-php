<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <?php session_start(); ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gerador de QR Code PIX</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
        <script src="https://kit.fontawesome.com/beafde8cd0.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="script/script.js"></script>
        <script type="text/javascript" src="script/copy.js"></script>
        <script type="text/javascript" src="script/download.js"></script>
    </head>
    <body>
        <div class="container">
                <div class="warnings">
                    <div class="warnings-title"><h3><i class="fa-solid fa-triangle-exclamation"></i> Atenção</h3></div>
                    <hr>
                    <div class="warnings-main">
                        <p>- Não faça o pix sem antes conferir se os dados estão completamente corretos.</p>
                        <p>- Nos isentamos de qualquer erro de sistema e ou possíveis erros na geração do Qr Code. Confira os dados.</p>
                    </div>
                    <div class="warnings-github">Você pode acessar o código fonte em:<br> 
                        <a href="https://github.com/Dianthony/gerador-pix-php" >
                            <i class="fa-brands fa-square-github"></i> Dianthony/gerador-pix-php</a>
                    </div>
                </div>
                <div class="main">
                    <form method="post" action="generator.php">
                        <div class="title"><h3>Gerador QR Code PIX</h3></div>
                        
                        <div class="subtitle"><h4>Dados do PIX</h4></div>

                        <div class="keyType">
                        <label>Tipo da Chave</label><br>
                            <input type="radio" id="keytype" name="keytype" value="1" onclick="typeMask();" required> Telefone <br>
                            <input type="radio" id="keytype" name="keytype" value="2" onclick="typeMask();" required> E-mail <br>
                            <input type="radio" id="keytype" name="keytype" value="3" onclick="typeMask();" required> CPF <br>
                            <input type="radio" id="keytype" name="keytype" value="4" onclick="typeMask();" required> CNPJ <br>
                        </div>
                        <div class="keyTransfer">
                            <label for="keyTransfer"> Chave Pix</label>
                            <input type="text" id="keyTransfer" name="keyTransfer" required disabled>
                        </div>
                        <div class="nameTransfer">
                            <label for="nameTransfer"> Nome do Beneficiário (até 25 letras)</label>
                            <input type="text" id="nameTransfer" name="nameTransfer" maxlength="25" required>
                        </div>
                        <div class="cityTransfer">
                            <label for="cityTransfer"> Cidade (Até 15 letras)</label>
                            <input type="text" id="cityTransfer" name="cityTransfer" maxlength="15" required>
                        </div>
                        <div class="valueTransfer">
                            <label for="valueTransfer"> Valor (opcional)</label>
                            <input type="text" id="valueTransfer" name="valueTransfer" oninput="mascaraMoeda(event);" placeholder="R$ 0,00">
                        </div>
                        <div class="idTransfer">
                            <label for="id"> Identificador (opcional)</label>
                            <input type="text" id="idTransfer" name="idTransfer" placeholder="PAGAMENTO1">
                        </div>
                    
                        <button type="submit"> Gerar Pix </button>
                    </form>
                </div>
                <div class="qrcode">
                    
                    <?php
                    if (isset($_SESSION['qrcode'])) {
                        echo $_SESSION['qrcode'];
                        unset($_SESSION['qrcode']);
                    } else {
                    ?>
                        <div class="no-qrcode">
                            <i class="fa-solid fa-qrcode"></i><br>
                            Preencha o formulário e seu Qr Code aparecerá aqui.
                        </div>
                        
                    <?php
                    }
                    ?>
                    <hr>
                    <div id="here-appear-theimages"></div>
                    <div class="info">
                            Developed by Dianthony Alves
                    </div>
                </div>
        </div>
    </body>
</html>