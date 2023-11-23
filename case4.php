<?php
class Student {
    public $name;
    public $grade;

    public function __construct($name, $grade) {
        $this->name = $name;
        $this->grade = $grade;
    }
}

class Group {
    public $students = [];

    public function addStudent($student) {
        $this->students[] = $student;
    }

    public function calculateAverage() {
        $total = 0;
        foreach ($this->students as $student) {
            $total += $student->grade;
        }
        return $total / count($this->students);
    }

    public function getTopStudent() {
        usort($this->students, function($a, $b) {
            return $b->grade - $a->grade;
        });
        return $this->students[0];
    }

    public function getLowestStudent() {
        usort($this->students, function($a, $b) {
            return $a->grade - $b->grade;
        });
        return $this->students[0];
    }

    public function moveStudent($student, $toGroup) {
        $key = array_search($student, $this->students);
        if ($key !== false) {
            unset($this->students[$key]);
            $toGroup->addStudent($student);
        }
    }
}

// Create groups and students
$group1 = new Group();
$group2 = new Group();

for ($i = 1; $i <= 10; $i++) {
    $group1->addStudent(new Student("Student $i", rand(1, 100)));
    $group2->addStudent(new Student("Student " . ($i + 10), rand(1, 100)));
}

// Calculate and display averages
echo "Average grade of group 1: " . $group1->calculateAverage() . "\n";
echo "Average grade of group 2: " . $group2->calculateAverage() . "\n";

// Move top student from group 1 to group 2 and lowest student from group 2 to group 1
$group1->moveStudent($group1->getTopStudent(), $group2);
$group2->moveStudent($group2->getLowestStudent(), $group1);

// Calculate and display averages again
echo "Average grade of group 1 after moving students: " . $group1->calculateAverage() . "\n";
echo "Average grade of group 2 after moving students: " . $group2->calculateAverage() . "\n";
?>