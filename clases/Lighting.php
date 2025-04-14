<?php

require_once "Lamp.php";

class Lighting extends Connection {
    public function getAllLamps() {
        $sql = "SELECT lamps.lamp_id, lamps.lamp_name, lamps.lamp_on AS lamp_active, lamp_models.model_part_number, lamp_models.model_wattage 
                FROM lamps 
                INNER JOIN lamp_models ON lamps.lamp_model = lamp_models.model_id 
                INNER JOIN zones ON lamps.lamp_zone = zones.zone_id 
                ORDER BY lamps.lamp_id";

        $rows = $this->getConexion()->query($sql);
        $lamps = [];

        while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
            $lamp = new Lamp(
                $row['lamp_id'],
                $row['lamp_name'],
                $row['lamp_active'], 
                $row['model_part_number'],
                $row['model_wattage']
            );
            $lamps[] = $lamp;
        }

        return $lamps;
    }

    public function getLampById($id) {
        $sql = "SELECT lamps.lamp_id, lamps.lamp_name, lamps.lamp_on AS lamp_active, lamp_models.model_part_number, lamp_models.model_wattage 
                FROM lamps 
                INNER JOIN lamp_models ON lamps.lamp_model = lamp_models.model_id 
                INNER JOIN zones ON lamps.lamp_zone = zones.zone_id 
                WHERE lamps.lamp_id = :id";

$resultado = $this->getConexion()->query($sql);

$row = $resultado->fetch(PDO::FETCH_ASSOC);

if ($row) {
    return new Lamp(
        $row['lamp_id'],
        $row['lamp_name'],
        $row['lamp_on'],
        $row['model_part_number'],
        $row['model_wattage']
    );
}

        return null; 
    }
    public function drawZonesOptions($zonaSeleccionada = null) {
        $sql = "SELECT zone_id, zone_name FROM zones";
        $resultado = $this->getConexion()->query($sql);

        //  desplegable
        echo "<select name='zone'>";

        // Recorre las zonas y genera las opciones
        while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $seleccionado = ($fila['zone_id'] == $zonaSeleccionada) ? "selected" : "";
            echo "<option value='" . $fila['zone_id'] . "' $seleccionado>" . $fila['zone_name'] . "</option>";
        }
        // Cierra el desplegable
        echo "</select>";
}
public function changeStatus($id, $status) {
    $status = ($status == 1) ? 1 : 0;

    $sql = "UPDATE lamps SET lamp_on = $status WHERE lamp_id = $id";
    
    $resultado = $this->getConexion()->query($sql);

    if ($resultado) {
        echo "El estado de la lámpara con ID $id se actualizó correctamente.";
    } else {
        echo "Error al actualizar el estado de la lámpara con ID $id.";
    }
}
}
?>