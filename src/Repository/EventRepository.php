<?php

	namespace App\Repository;

    use App\Entity\EventEntity as EventEntity;

	use Doctrine\ORM\{

		EntityRepository as EntityRepository,
		QueryBuilder     as QueryBuilder
	};
    
	class EventRepository extends EntityRepository {

		// @todo wymagane metody: update, delete, select (+ paginacja per page)

        public function findEvent($eventId) {

            $queryBuilder = new QueryBuilder($this->_em);

            $queryBuilder->select('event')
                         ->from($this->_class->getName(), 'event')
                         ->where('event.id = ?1')
                         ->setParameters([1 => $eventId]);

            $query  = $queryBuilder->getQuery();
            $result = $query->getOneOrNullResult();

            return $result;
        }

        public function findEventsPerPage($page = 1) {

            if ($page == 1) {

                $offset = 0;

            } else {

                $offset = (($page - 1) * 2);
            }

            $queryBuilder = new QueryBuilder($this->_em);

            $queryBuilder->select('event')
                         ->from($this->_class->getName(), 'event')
                         ->setFirstResult($offset)
                         ->setMaxResults(2);

            $query  = $queryBuilder->getQuery();
            $result = $query->getResult();

            return $result;
        }

        public function createEvent($eventEntity) {

            $this->_em->persist($eventEntity);
            $this->_em->flush();
        }

        public function updateEvent($eventId, $eventName, $eventDescription, $eventStartDate, $eventEndDate) {

            $queryBuilder = new QueryBuilder($this->_em);

            $queryBuilder->update(EventEntity::class, 'e')
                    ->set('e.title', "?2")
                    ->set('e.description', "?3")
                    ->set('e.dateFrom', "?4")
                    ->set('e.dateTo', "?5")
                    ->where('e.id = ?1')
                    ->setParameter(1, $eventId)
                    ->setParameter(2, $eventName)
                    ->setParameter(3, $eventDescription)
                    ->setParameter(4, $eventStartDate)
                    ->setParameter(5, $eventEndDate)
                    ->getQuery();

            $query = $queryBuilder->getQuery();

            $query->execute();
        }

        public function removeEvent($eventId) {

            $eventEntity = $this->_em->getReference(EventEntity::class, $eventId);

            $this->_em->remove($eventEntity);
            $this->_em->flush();
        }
	}