<?php

class Pedidos_Proveedor extends Conectar{

    public function get_pedidos_proveedor(){
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM ma_pedidos_proveedor";
        $sql = $conectar -> prepare($sql);
        $sql -> execute();
        return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_pedido_proveedor($id){
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM ma_pedidos_proveedor WHERE ID = ?";
        $sql = $conectar -> prepare($sql);
        $sql -> bindValue(1, $id);
        $sql -> execute();
        return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_pedido_proveedor($id_socio, $fecha_pedido, $detalle, $sub_total, $total_isv, $total, $fecha_entrega, $estado){
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO ma_pedidos_proveedor(id, id_socio, fecha_pedido, detalle, sub_total, total_isv, total, fecha_entrega, estado)
        VALUES (NULL,?,?,?,?,?,?,?,?);";
        $sql = $conectar -> prepare($sql);
        $sql -> bindValue(1, $id_socio);
        $sql -> bindValue(2, $fecha_pedido);
        $sql -> bindValue(3, $detalle);
        $sql -> bindValue(4, $sub_total);
        $sql -> bindValue(5, $total_isv);
        $sql -> bindValue(6, $total);
        $sql -> bindValue(7, $fecha_entrega);
        $sql -> bindValue(8, $estado);
        $sql -> execute();
        return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_pedido_proveedor($id, $fecha_pedido, $detalle, $sub_total, $total_isv, $total, $fecha_entrega, $estado){
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE ma_pedidos_proveedor SET fecha_pedido=?, detalle=?, sub_total=?, total_isv=?, total=?, fecha_entrega=?, estado=? WHERE ID = ?";
        $sql = $conectar -> prepare($sql);
        $sql -> bindValue(1, $fecha_pedido);
        $sql -> bindValue(2, $detalle);
        $sql -> bindValue(3, $sub_total);
        $sql -> bindValue(4, $total_isv);
        $sql -> bindValue(5, $total);
        $sql -> bindValue(6, $fecha_entrega);
        $sql -> bindValue(7, $estado);
        $sql -> bindValue(8, $id);
        $sql -> execute();
        return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_pedido_proveedor($id){
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM ma_pedidos_proveedor WHERE ID = ?";
        $sql = $conectar -> prepare($sql);
        $sql -> bindValue(1, $id);
        $sql -> execute();
        return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }
    
}

?>