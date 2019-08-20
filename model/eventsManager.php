<?php
namespace Benjamin\Aslcn\Model;
require_once("model/manager.php");
class EventsManager extends Manager{
    function __construct() {
        $this->newManager = new \Benjamin\Aslcn\Model\Manager();      
    }
    
    /**
     * Récupère les évènements commençant entre 2 dates
     * @param \DateTimeInterface $start
     * @param \DateTimeInterface $end
     * @return Event[]
     */
    public function getEventsBetween (\DateTimeInterface $start, \DateTimeInterface $end): array {
        $db = $this->newManager->dbConnect();
        $statement = $db->query("SELECT * FROM events WHERE start BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND '{$end->format('Y-m-d 23:59:59')}' ORDER BY start ASC");
        $statement->setFetchMode(\PDO::FETCH_CLASS, Event::class);
        $results = $statement->fetchAll();
        return $results;
    }

    /**
     * Récupère les évènements commençant entre 2 dates indexé par jour
     * @param \DateTimeInterface $start
     * @param \DateTimeInterface $end
     * @return array
     */
    public function getEventsBetweenByDay ($start, $end): array {
        $events = $this->getEventsBetween($start, $end);
        $days = [];
        foreach($events as $event) {
            $date = explode(' ', $event['start'])[0];
            if (!isset($days[$date])) {
                $days[$date] = [$event];
            } else {
                $days[$date][] = $event;
            }
        }
        return $days;
    }

    /**
     * Récupère un évènement
     * @param int $id
     * @return Event
     * @throws \Exception
     */
    public function find (int $id): Event {
        $db = $this->newManager->dbConnect();
        $statement = $db->query("SELECT * FROM events WHERE id = $id LIMIT 1");
        $statement->setFetchMode(\PDO::FETCH_CLASS, Event::class);
        $result = $statement->fetch();
        if ($result === false) {
            throw new \Exception('Aucun résultat n\'a été trouvé');
        }
        return $result;
    }

    /**
     * @param Event $event
     * @param array $data
     * @return Event
     */
    public function hydrate($event, array $data) {
        $event->setName($data['name']);
        $event->setDescription($data['description']);
        $event->setStart(\DateTimeImmutable::createFromFormat('Y-m-d H:i',
            $data['date'] . ' ' . $data['start'])->format('Y-m-d H:i:s'));
        $event->setEnd(\DateTimeImmutable::createFromFormat('Y-m-d H:i',
            $data['date'] . ' ' . $data['end'])->format('Y-m-d H:i:s'));
        
        return $event;
    }

    /**
     * Crée un évènement au niveau de la base de donnée
     * @param Event $event
     * @return bool
     */
    public function create (Event $event): bool {
        $db = $this->newManager->dbConnect();
        $statement = $db->prepare('INSERT INTO events (name, description, start, end) VALUES (?, ?, ?, ?)');
        return $statement->execute([
            $event->getName(),
            $event->getDescription(),
            $event->getStart()->format('Y-m-d H:i:s'),
            $event->getEnd()->format('Y-m-d H:i:s'),
        ]);
    }


    /**
     * Met à jour un évènement au niveau de la base de données
     * @param Event $event
     * @return bool
     */
    public function update (Event $event): bool {
        $db = $this->newManager->dbConnect();
        $statement = $db->prepare('UPDATE events SET name = ?, description = ?, start = ?, end = ? WHERE id = ?');
        return $statement->execute([
            $event->getName(),
            $event->getDescription(),
            $event->getStart()->format('Y-m-d H:i:s'),
            $event->getEnd()->format('Y-m-d H:i:s'),
            $event->getId()
        ]);
    }
    
}