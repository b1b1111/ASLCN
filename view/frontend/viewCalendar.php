<?php
$title = 'ASLCN';
require('header.php'); 
require('html.php');
require('template.php');
require('controller/calendrier.php');
?>

<div class="calendar">

  <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
    <h1><?= $month->toString(); ?></h1>

    <?php if (isset($_GET['success'])): ?>
      <div class="container">
        <div class="alert alert-success">
          L'évènement a bien été enregistré
        </div>
      </div>
    <?php endif; ?>

    <div>
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
                        <?= (new DateTime($event['start']))->format('H:i') ?> - <a href="<?= $_POST['URL_PATH'] ?>viewCalendar/editEvent?id=<?= $event['id']; ?>"><?= h($event['name']); ?></a>
                    </div>
                  <?php endforeach; ?>
              </td>
            <?php endforeach; ?>
        </tr>
      <?php endfor; ?>
  </table>

  <a href="<?= $_POST['URL_PATH'] ?>viewCalendar/addEvent" class="calendar__button">+</a>

</div>