<script type="text/javascript" src="script/script.js"></script>
<?php

    session_start();

    $keyPix = $_POST['keyTransfer'];
    $namePix = $_POST['nameTransfer'];
    $cityPix = $_POST['cityTransfer'];
    $valuePix = $_POST['valueTransfer'];
    $idPix = $_POST['idTransfer'];

    $typeKey = $_POST['keytype'];

    $remove = array("(", ")", "-", " ", ".");
    $broken = str_replace($remove, "", $keyPix);

    $removeReal = array("R", "$","\xC2\xA0");
    $prevalue = str_replace($removeReal, "", $valuePix);
    
    $removeValue = array(",");
    $brokenValue = str_replace($removeValue, ".", $prevalue);

    if($typeKey == 1){

        $newKeyPix = "+55".$broken;

        function formataCampo($id, $valor){
            return $id . str_pad(strlen($valor), 2, '0', STR_PAD_LEFT) . $valor;
        }
    
        function calculaCRC16($dados){
            $resultado = 0xFFFF;
            for ($i = 0; $i < strlen($dados); $i++){
                $resultado ^= (ord($dados[$i]) << 8);
                for ($j = 0; $j <8; $j++){
                    if($resultado & 0x8000){
                        $resultado = ($resultado << 1) ^ 0x1021;
                    } 
                    else{
                        $resultado <<= 1;
                    }
                    $resultado &= 0xFFFF;
                }
            }
            return strtoupper(str_pad(dechex($resultado), 4, '0', STR_PAD_LEFT));
        }
    
        function geraPix($newKeyPix, $idTx = '', $valor = 0.00){
            $resultado = "000201";
            $resultado .= formataCampo("26", "0014br.gov.bcb.pix" . formataCampo("01", $newKeyPix));
            $resultado .= "52040000";
            $resultado .= "5303986";
            echo $valor;
            if($valor > 0){
                $resultado .= formataCampo("54", number_format($valor, 2, '.', ''));
            }
            $resultado .= "5802BR";
            $resultado .= "5901N";
            $resultado .= "6001C";
            $resultado .= formataCampo("62", formataCampo("05", $idTx ?: '***'));
            $resultado .= "6304";
            $resultado .= calculaCRC16($resultado);
            return $resultado;
        }
    
        $codigoPix = geraPix($newKeyPix, $idPix, $brokenValue);
    
        $_SESSION['qrcode'] = '
            <section id="qrcode-placa"><h2>Placa Pix</h2></section><hr>
            <div class="session-qrcode"><img id="my-node" src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=' . urlencode($codigoPix) . '"></div>
            <div class="session-keypix"><strong>Chave Pix:</strong> '.$keyPix.'</div>
            <div class="session-namepix"><strong>Nome:</strong> '.$namePix.'</div>
            <div class="session-typepix"><strong>Tipo de Chave:</strong> Telefone </div>
            <div class="session-copy"><textarea readonly>'. $codigoPix .'</textarea> </div>
            <div class="session-btns"><button type="button"> Copiar Código </button>
            <button type="button" id="btn"> Baixar QR Code </button></div>';
    }

    else if($typeKey == 2){

        function formataCampo($id, $valor){
            return $id . str_pad(strlen($valor), 2, '0', STR_PAD_LEFT) . $valor;
        }
    
        function calculaCRC16($dados){
            $resultado = 0xFFFF;
            for ($i = 0; $i < strlen($dados); $i++){
                $resultado ^= (ord($dados[$i]) << 8);
                for ($j = 0; $j <8; $j++){
                    if($resultado & 0x8000){
                        $resultado = ($resultado << 1) ^ 0x1021;
                    } 
                    else{
                        $resultado <<= 1;
                    }
                    $resultado &= 0xFFFF;
                }
            }
            return strtoupper(str_pad(dechex($resultado), 4, '0', STR_PAD_LEFT));
        }
    
        function geraPix($keyPix, $idTx = '', $valor = 0.00){
            $resultado = "000201";
            $resultado .= formataCampo("26", "0014br.gov.bcb.pix" . formataCampo("01", $keyPix));
            $resultado .= "52040000";
            $resultado .= "5303986";
            echo $valor;
            if($valor > 0){
                $resultado .= formataCampo("54", number_format($valor, 2, '.', ''));
            }
            $resultado .= "5802BR";
            $resultado .= "5901N";
            $resultado .= "6001C";
            $resultado .= formataCampo("62", formataCampo("05", $idTx ?: '***'));
            $resultado .= "6304";
            $resultado .= calculaCRC16($resultado);
            return $resultado;
        }
    
        $codigoPix = geraPix($keyPix, $idPix, $brokenValue);
    
        $_SESSION['qrcode'] = '
            <p><img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . urlencode($codigoPix) . '"></p>
            <input type="text" value="'. $codigoPix .'"><br>
            <button type="button"> Copiar Código </button> <button type="button"> Baxiar QR Code </button>';
    }
    else if($typeKey >= 3){

        $newKeyPix = $broken;

        function formataCampo($id, $valor){
            return $id . str_pad(strlen($valor), 2, '0', STR_PAD_LEFT) . $valor;
        }
    
        function calculaCRC16($dados){
            $resultado = 0xFFFF;
            for ($i = 0; $i < strlen($dados); $i++){
                $resultado ^= (ord($dados[$i]) << 8);
                for ($j = 0; $j <8; $j++){
                    if($resultado & 0x8000){
                        $resultado = ($resultado << 1) ^ 0x1021;
                    } 
                    else{
                        $resultado <<= 1;
                    }
                    $resultado &= 0xFFFF;
                }
            }
            return strtoupper(str_pad(dechex($resultado), 4, '0', STR_PAD_LEFT));
        }
    
        function geraPix($newKeyPix, $idTx = '', $valor = 0.00){
            $resultado = "000201";
            $resultado .= formataCampo("26", "0014br.gov.bcb.pix" . formataCampo("01", $newKeyPix));
            $resultado .= "52040000";
            $resultado .= "5303986";
            echo $valor;
            if($valor > 0){
                $resultado .= formataCampo("54", number_format($valor, 2, '.', ''));
            }
            $resultado .= "5802BR";
            $resultado .= "5901N";
            $resultado .= "6001C";
            $resultado .= formataCampo("62", formataCampo("05", $idTx ?: '***'));
            $resultado .= "6304";
            $resultado .= calculaCRC16($resultado);
            return $resultado;
        }
    
        $codigoPix = geraPix($newKeyPix, $idPix, $brokenValue);
    
        $_SESSION['qrcode'] = '<p><img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . urlencode($codigoPix) . '"></p>
                               <input type="text" value="'. $codigoPix .'">';
    }
    header("Location: index.php#qrcode-placa");
?>