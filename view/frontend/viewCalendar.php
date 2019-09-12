<?php
$title = 'ASLCN';
require('header.php'); 
require('html.php');
require('template.php');
require_once('controller/calendrier.php');
?>

<div class="calendar">
Salut <?php echo $_SESSION['pseudo']; ?> de l'équipe <?php echo $_SESSION['teamName']; ?>
  <div class="top_calendar">
    <h1><?= $month->toString(); ?></h1>
      <div>
        <?php if (isset($_GET['success'])): ?>
          <div class="container">
            <div class="alert-success">
              L'évènement a bien été enregistré
            </div>
          </div> 
        <?php endif; ?>

        <a href="<?= $_POST['URL_PATH'] ?>calendrier?month=<?= $month->previousMonth()->month; ?>&year=<?= $month->previousMonth()->year; ?>" class="btn-select-calendar">&lt;</a>
        <a href="<?= $_POST['URL_PATH'] ?>calendrier?month=<?= $month->nextMonth()->month; ?>&year=<?= $month->nextMonth()->year; ?>" class="btn-select-calendar">&gt;</a>
    </div>
  </div>

  <table class="calendar__table calendar__table--<?= $weeks; ?>weeks">
      <?php for ($i = 0; $i < $weeks; $i++): ?>
        <tr>
            <?php
            foreach($month->days as $k => $day):
                $date = (clone $start)->modify("+" . ($k + $i * 7) . " days");
                $eventsForDay = $events[$date->format('Y-m-d')] ?? [];
                $isToday = date('Y-m-d') === $date->format('Y-m-d');
                ?>
                <td class="<?= $month->withinMonth($date) ? '' : 'calendar__othermonth'; ?> <?= $isToday ? 'is-today' : ''; ?>">
                  <?php if ($i === 0): ?>
                    <div class="calendar__weekday"><?= $day; ?></div>
                  <?php endif; ?>
                  <a class="calendar__day"><?= $date->format('d'); ?></a>

                  <?php foreach($eventsForDay as $event): ?>
                    <div class="calendar__event">
                      <?php if($_SESSION['id'] == 0) { ?>
                        <?= (new DateTime($event['start']))->format('H:i') ?> - <a href="<?= $_POST['URL_PATH'] ?>calendrier/viewEvent?id=<?= $event['id']; ?>"><?= h($event['name']); ?></a>
                      <?php
                      }
                      else {
                      ?>
                        <?= (new DateTime($event['start']))->format('H:i') ?> - <a href="<?= $_POST['URL_PATH'] ?>calendrier/viewEvent?id=<?= $event['id']; ?>"><?= h($event['name']); ?></a>
                        <a href="<?= $_POST['URL_PATH'] ?>calendrier/editEvent?id=<?= $event['id']; ?>" class="button_modif">M</a>
                      <?php } ?>  
                    </div>
                  <?php endforeach; ?>
              </td>
            <?php endforeach; ?>
        </tr>
      <?php endfor; ?>
  </table>

</div>
