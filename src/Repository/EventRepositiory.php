<?php

	namespace App\Repository;

	use Doctrine\ORM\{

		EntityRepository            as EntityRepository,
		QueryBuilder                as QueryBuilder,
        ORMException                as ORMException,
        ORMInvalidArgumentException as ORMInvalidArgumentException
	};

	use Doctrine\Common\Collections\Criteria as Criteria;

	/**
	 * Event repository.
     *
     * @author Karolina Dablowska
	 */
	class EventRepository extends EntityRepository {

		// @todo wymagane metody: update, insert, delete, select (+ paginacja per page)

        public function createEvent() {

            ;
        }

        public function updateEvent() {

            ;
        }

        public function removeEvent() {

            ;
        }
	}