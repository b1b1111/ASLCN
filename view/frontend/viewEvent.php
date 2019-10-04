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

<h2 id="title_comment">Commentaires</h2>

<form id="form_com" method="post" action="<?= $post['id'] ?>/createComment">

    <label for="author"></label><br />
    <input type="text" id="author" name="author" value="<?php echo $_SESSION['pseudo']; ?>"><br /><br />

    <label for="content">Message</label><br />
    <textarea id="full-test" name="content" contenteditable="true"></textarea><br />

    <input type="submit" class="btn_valid" value="Commentaire" onclick="Message()" >
</form>

<?php

while ($comment = $comments->fetch()) { ?>

    <p class="comment_paragraphe" ><strong><?= htmlspecialchars($user['pseudo']); ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p class="comment_paragraphe" ><?= nl2br(htmlspecialchars($comment['content'])) ?>
    
<?php } ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </form>
</div>