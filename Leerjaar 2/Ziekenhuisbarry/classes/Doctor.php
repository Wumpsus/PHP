<?php
require_once 'classes/Staff.php';

class Doctor extends Staff {
    private float $hourlyRate;
    private int $appointments = 0;
    
    public function __construct(string $name, float $hourlyRate) {
        parent::__construct($name, 0, "Doctor");
        $this->hourlyRate = $hourlyRate;
    }

    public function getRole(): string {
        return "Doctor"; // Hier implementeren we de abstracte methode
    }

    public function addAppointment(): void {
        $this->appointments++;
    }

    public function calculateSalary(): float {
        return $this->appointments * $this->hourlyRate;
    }
}
