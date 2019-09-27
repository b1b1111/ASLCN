<?php
$title = 'ASLCN';
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


<table class="table_score">
    <thead>
        <tr>
            <th>Equipe</th>
            <th>Point</th>
            <th>Joker</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>4 gars 1 fille</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <td>En avant les Glands</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <td>Skipailh BZH</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <td>Capillo</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <td>The Wall</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <td>4'Ever</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <td>EMA</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <td>kékéhuetes</td>
            <td>0</td>
            <td>0</td>
        </tr>
    </tbody>
</table>

<table class="table-responsive">
        <thead>
            <tr>
                <th>Nom</th>
            </tr>
        </thead>
        <?php {
            foreach($post as $pres) {
                echo "<tbody>";
                    echo "<tr>";
                    echo "<td>" . $pres['pseudo'] . "</td>"; 
                    echo "</tr>";
                echo "</tbody>";   
            }   
        } ?>
    </table>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </form>
</div>