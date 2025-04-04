<?php
require_once 'classes/Person.php';

abstract class Staff extends Person {
    protected float $salary;
    
    public function __construct(string $name, float $salary, string $role) {
        parent::__construct($name, $role);
        $this->salary = $salary;
    }
    
    abstract public function calculateSalary(): float;
    
    public function getSalary(): float {
        return $this->salary;
    }
}
