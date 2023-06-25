<?php

class Transport {
    protected string $name;
    protected int $speed;

    public function __construct($name, $speed) {
        $this->name = $name;
        $this->speed = $speed;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getSpeed(): int {
        return $this->speed;
    }

    public function getInfo() {
        return "This is a {$this->name} transport and its speed is {$this->speed} km/h";
    }
}

class Car extends Transport {
    private $numDoors;

    public function __construct($name, $speed, $numDoors) {
        parent::__construct($name, $speed);
        $this->numDoors = $numDoors;
    }

    public function startEngine() {
        return "The {$this->name} starts the engine";
    }

    public function getNumDoors() {
        return $this->numDoors;
    }

    public function setNumDoors($numDoors): void {
        $this->numDoors = $numDoors;
    }
}

class Bicycle extends Transport {
    private int $numGears;

    public function __construct($name, $speed, $numGears) {
        parent::__construct($name, $speed);
        $this->numGears = $numGears;
    }

    public function getNumGears(): int {
        return $this->numGears;
    }

    public function setNumGears(int $numGears): void {
        $this->numGears = $numGears;
    }

    public function ringBell() {
        return 'We hear the sound of a bicycle';
    }
}

class Boat extends Transport {
    private string $typeBoat;

    public function __construct($name, $speed, $typeBoat) {
        parent::__construct($name, $speed);
        $this->typeBoat = $typeBoat;
    }

    public function getTypeBoat(): string {
        return $this->typeBoat;
    }

    public function setTypeBoat(string $typeBoat): void {
        $this->typeBoat = $typeBoat;
    }

    public function help() {
        return "The {$this->name} calls SOS SOS SOS";
    }
}

function printTransportInfo($transports) {
    foreach ($transports as $transport) {
        echo $transport->getInfo() . "\n";
    }
}

$boat1 = new Boat('Victoria', 20, 'yacht');
$bmx = new Bicycle('bmx', 30, 3);
$vw = new Car('t-roc', 160, 5);

$transport = [$boat1, $bmx, $vw];

printTransportInfo($transport);



