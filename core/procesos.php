<?php

$host_aceptados = array('localhost','127.0.0.1');
$metodo_aceptdo = 'POST';
$usuario_correcto = "Admin";
$pasword_correcto = "Admin";

$txt_usuario = $_POST["txt_usuario"];
$txt_password = $_POST["txt_password"];

$token = "";


if( in_array($_SERVER["HTTP_HOST"], $host_aceptados)){
    	
    if($_SERVER["REQUEST_METHOD"] == $host_aceptados){

            if(isset($txt_usuario) && !empty($txt_usuario)){


                if(isset($txt_password) && !empty($txt_password)){

                    if($txt_usuario==$usuario_correcto){

                        if($txt_password==$password_correcto){

                            $ruta = "Welcome.php";
                            $msg = "";
                            $codigo_estado = 200;
                            $texto_estado = "ok";
                            list($usec,$sec) = explode('',microtime());
                            $token = base64_encode(date("Y-m-d H:i:s" , $sec).substr($usec,1));
                    }else{
                        $ruta = "";
                    $msg = "Contra Mala";
                    $codigo_estado = 400;
                    $texto_estado = "ok";
                    $token = "";
                    }
                    
                }else{

                    $ruta = "";
                    $msg = "No se roconoce l usuario";
                    $codigo_estado = 401;
                    $texto_estado = "unauthorized";
                    $token = "";
                }
            }else{

                $ruta = "";
                    $msg = "el campo del usurio esta vacio";
                    $codigo_estado = 401;
                    $texto_estado = "unauthorized";
                    $token = "";
            }
    }else{

        $ruta = "";
                    $msg = "el campo de la contra esta vacio";
                    $codigo_estado = 405;
                    $texto_estado = "method not allowed";
                    $token = "";
    }



}else{

    $ruta = "";
    $msg = "el campo sta vacio";
    $codigo_estado = 401;
    $texto_estado = "unauthorized";
    $token = "";

}
}else{

    $ruta = "";
                    $msg = "el campo sta vacio";
                    $codigo_estado = 401;
                    $texto_estado = "unauthorized";
                    $token = "";
}

$arreglo_respuesta = array(
    "status" => ((intval($codgo_estado) == 200 ) ? "ok": "Error"),
    "Error" => ( (intvsl($codigo_estdo) == 200 ) ? "" : array("code"=> $codigo_estado, "Message"=>$msg));
    "data" => array (
        "url" => $ruta,
        "token" =>$token 

    );
    "count" =>1
);

header ("HTTP/1.1". $codigo_estado. " ". $texto_estado);
header ("Conten-Type: Application/json");
echo(json_encode)

?>