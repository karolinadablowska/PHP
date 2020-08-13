<?php

	declare(strict_types=1);

	namespace App\Repository;

	// doctrine
	use Doctrine\ORM\{

		EntityRepository            as EntityRepository,
		QueryBuilder                as QueryBuilder,
        ORMException                as ORMException,
        ORMInvalidArgumentException as ORMInvalidArgumentException
	};

	use Doctrine\Common\Collections\Criteria as Criteria;

	/**
	 * User repository.
     *
     * @author Karolina Dablowska
	 */
	class UserRepository extends EntityRepository {

		// @todo wymagane metody: update, insert, delete, select (+ paginacja per page)
	}