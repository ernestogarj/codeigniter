function insertar_empleado($nombre, $sueldo){
    $data = array(
        'nombre' => $nombre,
        'sueldo' => $sueldo
    );
    return $this->db->insert('empleados', $data);
}