<?php
require_once __DIR__ . '/Patient.php';
require_once __DIR__ . '/Doctor.php';
require_once __DIR__ . '/Nurse.php';

class Appointment {
    private static array $appointments = [];
    private Patient $patient;
    private Doctor $doctor;
    private ?Nurse $nurse;
    private DateTime $beginTime;
    private DateTime $endTime;
    
    public function __construct(Patient $patient, Doctor $doctor, ?Nurse $nurse, DateTime $beginTime, DateTime $endTime) {
        $this->patient = $patient;
        $this->doctor = $doctor;
        $this->nurse = $nurse;
        $this->beginTime = $beginTime;
        $this->endTime = $endTime;
        
        $this->doctor->addAppointment();
        if ($this->nurse) {
            $this->nurse->addAppointment();
        }
        self::$appointments[] = $this;
    }
    
    public function getDuration(): float {
        return $this->beginTime->diff($this->endTime)->h;
    }
    
    public static function getAllAppointments(): array {
        return self::$appointments;
    }
}
