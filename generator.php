<?php

    session_start();

    $keyPix = $_POST['keyTransfer'];
    $namePix = $_POST['nameTransfer'];
    $cityPix = $_POST['cityTransfer'];
    $valuePix = $_POST['valueTransfer'];
    $idPix = $_POST['idTransfer'];

    $typeKey = $_POST['keytype'];

    if($typeKey == 1){
        $newKeyPix = "+55".$keyPix;
        $newValue = explode(" ", $valuePix);

        echo $valuePix;
        echo $newValue[0];

        function formataCampo($id, $valuePix){
            return $id . str_pad(strlen($valuePix), 2, '0', STR_PAD_LEFT) . $valuePix;
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
    
        function geraPix($newKeyPix, $idTx = '', $valuePix = 0.00){
            $resultado = "000201";
            $resultado .= formataCampo("26", "0014br.gov.bcb.pix" . formataCampo("01", $newKeyPix));
            $resultado .= "52040000";
            $resultado .= "5303986";
            if($valuePix > 0){
                $resultado .= formataCampo("54", number_format($valuePix, 2, '.', ''));
            }
            $resultado .= "5802BR";
            $resultado .= "5901N";
            $resultado .= "6001C";
            $resultado .= formataCampo("62", formataCampo("05", $idTx ?: '***'));
            $resultado .= "6304";
            $resultado .= calculaCRC16($resultado);
            return $resultado;
        }
    
        $codigoPix = geraPix($newKeyPix, $idPix, $valuePix);
    
        echo '<p><img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . urlencode($codigoPix) . '"></p>
                               <p>Código PIX: '. $codigoPix .'</p>';
    }

   // header("Location: index.php")
?>