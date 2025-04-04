<?php
require_once 'classes/Appointment.php';

$patient = new Patient("John Doe", 100);
$doctor = new Doctor("Dr. Smith", 50);
$nurse = new Nurse("Nurse Joy", 2000, 20);

$appointment = new Appointment($patient, $doctor, $nurse, new DateTime("10:00"), new DateTime("11:00"));

echo "Doctor's salary: " . $doctor->calculateSalary() . "\n";
echo "Nurse's salary: " . $nurse->calculateSalary() . "\n";
