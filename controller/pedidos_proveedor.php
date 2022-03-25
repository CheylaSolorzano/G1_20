<?php
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
  }
    header('Access-Control-Allow-Origin: *');  
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Pedidos_Proveedor.php");
    $pedidos_proveedor = new Pedidos_Proveedor();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){
        
        case "GetPedidos_Proveedor":
            $datos = $pedidos_proveedor -> get_pedidos_proveedor();
            echo json_encode($datos);
        break;

        case "GetPedido_Proveedor":
            $datos = $pedidos_proveedor -> get_pedido_proveedor($body["ID"]);
            echo json_encode($datos);
        break;

        case "InsertPedido_Proveedor":
            $datos = $pedidos_proveedor -> insert_pedido_proveedor($body["ID_SOCIO"],$body["FECHA_PEDIDO"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_ENTREGA"],$body["ESTADO"]);
            echo json_encode("Pedido del proveedor agregado");
        break;

        case "UpdatePedido_Proveedor":
            $datos = $pedidos_proveedor -> update_pedido_proveedor($body["ID"],$body["ID_SOCIO"], $body["FECHA_PEDIDO"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_ENTREGA"],$body["ESTADO"]);
            echo json_encode("Pedido del proveedor actualizado");
        break;
        
        case "DeletePedido_Proveedor":
            $datos = $pedidos_proveedor -> delete_pedido_proveedor($body["ID"]);
            echo json_encode("Pedido del proveedor eliminado");
        break;
    }
?>