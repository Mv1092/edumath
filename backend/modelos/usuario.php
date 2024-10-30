<?php 
    class usuario{
        //atributo
        public $conexion;
        //metodo constructor
        public function __construct($conexion) {
            $this->conexion =$conexion;
        }
     public function consulta(){
            $con = "SELECT * FROM usuario ORDER BY nombre";
            $res = mysqli_query($this->conexion, $con);
            $vec =[];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
        }
            return $vec;
        
    }
    public function eliminar($id){
        $del = "DELETE FROM usuario WHERE id_usuario = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec ['resultado']= "OK";
        $vec ['mensaje']= "se borro con exito";
        return $vec;
    }
   
    public function insertar($params){
        $ins = "INSERT INTO usuario(id_usuario,nombre, apellidos, fecha_de_nacimiento, email, clave, tipo_usuario) VALUES('$params->id_usuario','$params->nombre','$params->apellidos','$params->fecha_de_nacimiento','$params->email','$params->clave','$params->tipo_usuario')";
        mysqli_query($this->conexion,$ins);
        $vec = [];
        $vec ['resultado']= "OK";
        $vec ['mensaje']= "se actualizaron los datos";
        return $vec;
    }
   
    public function editar($id, $params){
        $editar = "UPDATE usuario SET id_usuario ='$params->id_usuario', nombre = '$params->nombre', apellidos = '$params->apellidos',fecha_de_nacimiento = '$params->fecha_de_nacimineto', email = '$params->email', clave = '$params->clave', tipo ='$params->tipo_usuario' WHERE id_usuario = $id";
        mysqli_query($this->conexion,$editar);
        $vec = [];
        $vec ['resultado']= "OK";
        $vec ['mensaje']= "se edito la informacion ";
        return $vec;
    }



    
    public function filtro($valor){
        $filtro = "SELET * FROM usuario WHERE nombre LIKE'%valor%'";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];
        
        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }
        return $vec;
    }
}

?>
