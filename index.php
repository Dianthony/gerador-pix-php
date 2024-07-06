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
        <script type="text/javascript" src="script/script.js"></script>
    </head>
    <body>
        <div class="container">
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
                            <input type="radio" id="keytype" name="keytype" value="5" onclick="typeMask();" required> Alfanumérico <br>
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

                <?php
                if (isset($_SESSION['qrcode'])) {
                    echo $_SESSION['qrcode'];
                    unset($_SESSION['qrcode']);
                }
                ?>
        </div>
    </body>
</html>