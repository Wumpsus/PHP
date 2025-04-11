<?php
require_once 'classes.php';

// Data opbouw (zoals eerder gedeeld)
$groupA = new Group("sod2a");
$groupB = new Group("sod2b");

$teacher1 = new Teacher("BARRY VAN HELDEEEEEEE");
$teacher2 = new Teacher("JANNETJE VAN DE BRUGGEEEEE");
$teacher3 = new Teacher("ROBBIE WIGMANSJEEEEE");

$schooltrip = new Schooltrip("Walibi Holland", 10);

$list1 = new SchooltripList();
$list1->setTeacher($teacher1);
$list1->addStudentToList(new Student("Pietertje", $groupA), false);
$list1->addStudentToList(new Student("Motje", $groupA), true);
$list1->addStudentToList(new Student("Yvan", $groupA), true);
$schooltrip->addSchooltripList($list1);

$list2 = new SchooltripList();
$list2->setTeacher($teacher2);
$list2->addStudentToList(new Student("Michael", $groupB), true);
$list2->addStudentToList(new Student("Mohammed", $groupB), false);
$list2->addStudentToList(new Student("Erdhem", $groupB), true);
$schooltrip->addSchooltripList($list2);

$list3 = new SchooltripList();
$list3->setTeacher($teacher3);
$list3->addStudentToList(new Student("Brawl Stars Master 30000", $groupB), false);
$list3->addStudentToList(new Student("Gert.", $groupA), true);
$schooltrip->addSchooltripList($list3);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Schooluitje Overzicht</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin-bottom: 30px;
        }
        th, td {
            border: 1px solid black;
            padding: 6px 10px;
            text-align: left;
        }
        th {
            background-color: #e2e2e2;
        }
    </style>
</head>
<body>
    <h1>Overzicht van het schooluitje naar: <?= $schooltrip->getName(); ?></h1>

    <table>
        <tr>
            <th>Docent</th>
            <th>Student</th>
            <th>Klas</th>
            <th>Betaald</th>
        </tr>
        <?php foreach ($schooltrip->getSchooltripLists() as $list): ?>
            <?php
                $teacherName = $list->getTeacher()->getName();
                $firstRow = true;
                foreach ($list->getStudentList() as $entry):
                    $student = $entry['student'];
                    $group = $student->getGroup()->getName();
                    $paid = $entry['paid'] ? "Ja" : "Nee";
            ?>
                <tr>
                    <td><?= $firstRow ? $teacherName : "" ?></td>
                    <td><?= $student->getName() ?></td>
                    <td><?= $group ?></td>
                    <td><?= $paid ?></td>
                </tr>
            <?php
                $firstRow = false;
                endforeach;
            ?>
        <?php endforeach; ?>
    </table>
</body>
</html>