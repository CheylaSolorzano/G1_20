<?php

    class Facturas extends Conectar{

        public function get_facturas(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_facturas_cliente";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }

        public function get_factura($id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_facturas_cliente WHERE ID = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$id);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);

        }
        public function insert_facturas($numeroF,$idSocio,$fechaF,$detalle,$subT,$totalISV,$total,$fechaVencimiento,$estado){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO ma_facturas_cliente(id,numero_factura,id_socio,fecha_factura,detalle,sub_total,total_isv,total,fecha_vencimiento,estado) VALUES (NULL,?,?,?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$numeroF);
            $sql->bindValue(2,$idSocio); 
            $sql->bindValue(3,$fechaF);
            $sql->bindValue(4,$detalle);
            $sql->bindValue(5,$subT);
            $sql->bindValue(6,$totalISV);
            $sql->bindValue(7,$total);
            $sql->bindValue(8,$fechaVencimiento);
            $sql->bindValue(9,$estado);
            $sql->execute();
            return $resultado = $sql->fetchALL(PDO::FETCH_ASSOC);
            }
            public function update_factura($id,$numeroF,$idSocio,$fechaF,$detalle,$subT,$totalISV,$total,$fechaVencimiento,$estado ){
                $conectar= parent::conexion();
                parent::set_names();
                $sql="UPDATE ma_facturas_cliente SET numero_factura=? , id_socio=? ,fecha_factura=? , detalle=? , sub_total=? , total_isv=? , total=? , fecha_vencimiento=? , estado=? WHERE ID=?";
                $sql=$conectar->prepare($sql);
                
                $sql->bindValue(1, $numeroF);
                $sql->bindValue(2, $idSocio);
                $sql->bindValue(3, $fechaF);
                $sql->bindValue(4, $detalle);
                $sql->bindValue(5, $subT);
                $sql->bindValue(6, $totalISV);
                $sql->bindValue(7, $total);
                $sql->bindValue(8, $fechaVencimiento);
                $sql->bindValue(9, $estado);
                $sql->bindValue(10, $id);
                $sql->execute();
                return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            }
        public function delete_factura($id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM ma_facturas_cliente  WHERE ID=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    ?>