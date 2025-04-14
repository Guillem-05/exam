<?php
class Lamp {
    private $id;
    private $name;
    private $isActive; 
    private $modelPartNumber;
    private $modelWattage;
    private $zone;

    public function __construct($id, $name, $isActive, $modelPartNumber, $modelWattage) {
        $this->id = $id;
        $this->name = $name;
        $this->isActive = $isActive; 
        $this->modelPartNumber = $modelPartNumber;
        $this->modelWattage = $modelWattage;
        $this->zone = $zone;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function isActive() { 
        return $this->isActive;
    }

    public function getModelPartNumber() {
        return $this->modelPartNumber;
    }

    public function getModelWattage() {
        return $this->modelWattage;
    }
    
    public function getZone() {
        return $this->zone;
    }
}
?>