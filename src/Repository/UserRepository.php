<?php

	declare(strict_types=1);

	namespace App\Repository;

	use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface as UserLoaderInterface;

	use Doctrine\ORM\{

		EntityRepository as EntityRepository,
		QueryBuilder     as QueryBuilder
	};

	class UserRepository extends EntityRepository implements UserLoaderInterface {

		public function loadUserByUsername($username) {

			$queryBuilder = new QueryBuilder($this->_em);

			$queryBuilder->select('user')
						 ->from($this->_class->getName(), 'user')
						 ->where('user.email = ?1')
						 ->setParameters([1 => $username]);

			$query  = $queryBuilder->getQuery();
			$result = $query->getOneOrNullResult();

			return $result;
		}
	}