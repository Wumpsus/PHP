<?php
require_once 'classes/Staff.php';

class Nurse extends Staff {
    private float $bonus;
    private int $appointments = 0;
    
    public function __construct(string $name, float $salary, float $bonus) {
        parent::__construct($name, $salary, "Nurse");
        $this->bonus = $bonus;
    }

    public function getRole(): string {
        return "Nurse"; // Hier implementeren we de abstracte methode
    }

    public function addAppointment(): void {
        $this->appointments++;
    }

    public function calculateSalary(): float {
        return $this->salary + ($this->appointments * $this->bonus);
    }
}
