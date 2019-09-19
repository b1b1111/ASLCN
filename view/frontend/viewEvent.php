<?php
$title = 'ASLCN';
require('header.php'); 
require('html.php');
require('template.php');
require('controller/edit.php');
?>

<a class="back_link" href="<?= $_POST['URL_PATH'] ?>calendrier">Retour au calendrier</a>

<div class="container">

  <h1>Evènement
    <small><?= h($event->getName()); ?></small>
  </h1>

<form action="" method="post" class="form">
  <div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="teamName">Equipe</label>
            <input id="teamName" type="text" disabled required class="form-control" name="teamName" value="<?= isset($data['teamName']) ? h($data['teamName']) : ''; ?>">
            <?php if (isset($errors['teamName'])): ?>
                <small class="form-text text-muted"><?= $errors['teanName']; ?></small>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="name">Titre</label>
            <input id="name" type="text" disabled required class="form-control" name="name" value="<?= isset($data['name']) ? h($data['name']) : ''; ?>">
            <?php if (isset($errors['name'])): ?>
                <small class="form-text text-muted"><?= $errors['name']; ?></small>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="date">Date</label>
            <input id="date" type="date" disabled required class="form-control" name="date" value="<?= isset($data['date']) ? h($data['date']) : ''; ?>">
            <?php if (isset($errors['date'])): ?>
                <small class="form-text text-muted"><?= $errors['date']; ?></small>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="start">Démarrage</label>
            <input id="start" type="time" disabled required class="form-control" name="start" placeholder="HH:MM" value="<?= isset($data['start']) ? h($data['start']) : ''; ?>">
            <?php if (isset($errors['start'])): ?>
                <small class="form-text text-muted"><?= $errors['start']; ?></small>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="end">Fin</label>
            <input id="end" type="time" disabled required class="form-control" name="end" placeholder="HH:MM" value="<?= isset($data['end']) ? h($data['end']) : ''; ?>">
        </div>
    </div>
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" disabled id="description" class="form-control"><?= isset($data['description']) ? h($data['description']) : ''; ?></textarea>
</div>

<?php echo $_POST['present']; ?>

<table class="table-responsive">
    <thead>
        <tr>
            <th>Equipe</th>
            <th>Nom</th>
            <th>Présent</th>
            <th>Absent</th>
        </tr>
    </thead>
    <?php {
        foreach($membre as $m) {
            
            echo "<tbody>";
                echo "<tr>";
                    echo "<td>" . $m['teamName'] . "</td>";
                    echo "<td>" . $m['pseudo'] . "</td>";
                    echo "<td>" . $m['present'] . "</td>";
                    echo "<td>" . $m['absent'] . "</td>"; 
                echo "</tr>";
            echo "</tbody>";   
        }   
    } ?>
</table>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </form>
</div>