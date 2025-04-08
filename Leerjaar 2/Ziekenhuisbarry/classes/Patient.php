<?php
require_once 'classes/Person.php';

class Patient extends Person {
    private float $payment;
    
    public function __construct(string $name, float $payment) {
        parent::__construct($name, "Patient");
        $this->payment = $payment;
    }
    
    public function getRole(): string {
        return "Patient";
    }
    
    public function getPayment(): float {
        return $this->payment;
    }
}
