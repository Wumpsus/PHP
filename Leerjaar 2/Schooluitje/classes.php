<?php
abstract class Person {
    protected string $name;
    protected string $role;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }

    abstract public function role(): string;
}

class Teacher extends Person {
    private float $salary;

    public function __construct(string $name, float $salary = 0.0) {
        parent::__construct($name);
        $this->salary = $salary;
    }

    public function role(): string {
        return 'Teacher';
    }

    public function getSalary(): float {
        return $this->salary;
    }
}

class Group {
    private string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }
}

class Student extends Person {
    private Group $classname;

    public function __construct(string $name, Group $classname) {
        parent::__construct($name);
        $this->classname = $classname;
    }

    public function role(): string {
        return 'Student';
    }

    public function getGroup(): Group {
        return $this->classname;
    }
}

class SchooltripList {
    private array $studentList = []; // ['student' => Student, 'paid' => bool]
    private ?Teacher $teacher = null;

    public function addStudentToList(Student $student, bool $paid): void {
        $this->studentList[] = ['student' => $student, 'paid' => $paid];
    }

    public function setTeacher(Teacher $teacher): void {
        $this->teacher = $teacher;
    }

    public function getStudentList(): array {
        return $this->studentList;
    }

    public function getTeacher(): ?Teacher {
        return $this->teacher;
    }

    public function getPaidStudentCount(): int {
        return count(array_filter($this->studentList, fn($entry) => $entry['paid']));
    }

    public function getTotalAmount(int $price): int {
        return $this->getPaidStudentCount() * $price;
    }

    public function getTotalStudentCount(): int {
        return count($this->studentList);
    }
}

class Schooltrip {
    private string $name;
    private array $schooltripLists = [];
    private int $amount;

    public function __construct(string $name, int $amount) {
        $this->name = $name;
        $this->amount = $amount;
    }

    public function addSchooltripList(SchooltripList $list): void {
        $this->schooltripLists[] = $list;
    }

    public function getSchooltripLists(): array {
        return $this->schooltripLists;
    }

    public function getTotalPaid(): int {
        return array_sum(array_map(
            fn($list) => $list->getTotalAmount($this->amount),
            $this->schooltripLists
        ));
    }

    public function countStudent(): int {
        return array_sum(array_map(
            fn($list) => $list->getTotalStudentCount(),
            $this->schooltripLists
        ));
    }

    public function getAmount(): int {
        return $this->amount;
    }

    public function getName(): string {
        return $this->name;
    }
}
?>