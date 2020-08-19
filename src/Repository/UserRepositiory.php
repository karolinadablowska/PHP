<?php

	declare(strict_types=1);

	namespace App\Repository;

	use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface as UserLoaderInterface;

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
	class UserRepository extends EntityRepository implements UserLoaderInterface {

		/**
		 * Loading user by username or e-mail address.
		 *
		 * @param string $username_ Username.
		 *
		 * @return App\Entity\Database\User|null Instancja klasy w przypadku znalezienia rekordu w bazie danych, NULL gdy żadnego rekordu nie znaleziono.
		 */
		public function loadUserByUsername($username_) {

			// Query builder
			$queryBuilder = new QueryBuilder($this->_em);

			// Konstruowanie zapytania
			$queryBuilder->select('user')
						 ->from($this->_class->getName(), 'user')
						 ->where('user.username = ?1 OR user.email = ?2')
						 ->setParameters(

							array(

								1 => $username_,
								2 => $username_
							)
						 );

			// Zapytanie
			$query = $queryBuilder->getQuery();

			// Wynik zapytania
			$result = $query->getOneOrNullResult();

			// Zwrot metody
			return $result;
		}
	}