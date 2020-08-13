<?php

	declare(strict_types=1);

	namespace App\Entity;

	use Symfony\Component\Security\Core\User\UserInterface as UserInterface;
	use Doctrine\ORM\Mapping as ORM;

	/**
	 * User entity.
     *
     * @ORM\Entity
	 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
	 * @ORM\Table(name="users")
     *
     * @author Karolina Dąblowska
	 */
	class UserEntity implements UserInterface, \Serializable {

		// PROPERTIES
		
			/**
			 * @var int Id.
			 *
			 * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned": true})
		     * @ORM\Id
		     * @ORM\GeneratedValue(strategy="AUTO")
			 */
			private $id;

			/**
		     * @var string Name.
		     *
		     * @ORM\Column(name="name", type="string", nullable=true, length=255)
		     */
		    private $name;

		    /**
		     * @var string Surname.
		     *
		     * @ORM\Column(name="surname", type="string", nullable=true, length=255)
		     */
		    private $surname;

			/**
			 * @var string Username.
			 *
		     * @ORM\Column(name="username", type="string", nullable=false, length=255, unique=true)
		     */
		    private $username;

		    /**
		     * @var string Password.
			 *
			 * @see https://packagist.org/packages/usu/scrypt-password-encoder-bundle scrypt dla SF2
			 *
		     * @ORM\Column(name="password", type="string", nullable=false, length=255, unique=true)
		     */
		    private $password;

		    /**
		     * @var string E-mail.
			 *
		     * @ORM\Column(name="email", type="string", nullable=false, length=255, unique=true)
		     */
		    private $email;

	    // GETTERS

		    /**
		     * Get id.
		     *
		     * @return int
		     */
		    public function getId(): int {
		    	
		        return $this->id;
		    }

		    /**
		     * Get name.
		     *
		     * @return string
		     */
		    public function getName(): string {

		        return $this->name;
		    }

		    /**
		     * Get Surname.
		     *
		     * @return string
		     */
		    public function getSurname(): string {

		        return $this->surname;
		    }

		    /**
		     * Get username.
		     *
		     * @return string
		     */
		    public function getUsername(): string {

		        return $this->username;
		    }

		    /**
		     * Get password.
		     *
		     * @return string
		     */
		    public function getPassword(): string {

		        return $this->password;
		    }

		    /**
		     * Get e-mail.
		     *
		     * @return string
		     */
		    public function getEmail(): string {

		        return $this->email;
		    }

		    /**
		     * Get roles.
		     *
		     * UWAGA! Metoda wymagana przez interfejs.
		     *
		     * @return array
		     */
		    public function getRoles(): array {

		        return array('ROLE_USER');
		    }

		    /**
	         * Get password salt.
	         *
		     * UWAGA! Metoda wymagana przez interfejs.
		     *
	         * @return null
	         */
		    public function getSalt() {

		        return null;
		    }

		    /**
		     * Czyszczenie wrażliwych danych (np. niezakodowane hasło).
		     *
		     * UWAGA! Metoda wymagana przez interfejs.
		     *
		     * @return void
		     */
		    public function eraseCredentials() {}

	    // SETTERS

		    /**
		     * Set id.
		     *
		     * @param int $id_ Id.
		     *
		     * @return $this
		     */
		    public function setId(int $id_ = 0) {
		    	
		        $this->id = $id_;

		        return $this;
		    }

		    /**
		     * Set name.
		     *
		     * @param string $name_ Name.
		     *
		     * @return $this
		     */
		    public function setName(string $name_ = "") {

		        $this->name = $name_;

		        return $this;
		    }

		    /**
		     * Set surname.
		     *
		     * @param string $surname_ Surname.
		     *
		     * @return $this
		     */
		    public function setSurname(string $surname_ = "") {

		        $this->surname = $surname_;

		        return $this;
		    }

		    /**
		     * Set username.
		     *
		     * @param string $username_ Username.
		     *
		     * @return $this
		     */
		    public function setUsername(string $username_ = "") {

		        $this->username = $username_;

		        return $this;
		    }

		    /**
		     * Set password.
		     *
		     * @param string $password_ Password.
		     *
		     * @return $this
		     */
		    public function setPassword(string $password_ = "") {

		        $this->password = $password_;

		        return $this;
		    }

		    /**
		     * Set e-mail.
		     *
		     * @param string $email_ E-mail.
		     *
		     * @return $this
		     */
		    public function setEmail(string $email_ = "") {

		        $this->email = $email_;

		        return $this;
		    }

		    /**
		     * Setter ról.
		     *
		     * @param array $roles_ Role.
		     *
		     * @return void
		     */
		    /*public function setRoles(array $roles_) {

		        $this->roles = $roles_;
		    }*/

	    // SERIALIZE

		    /**
		     * Serializacja danych do sesji.
		     *
		     * @return string Zserializowane dane.
		     */
		    public function serialize() {

		        return serialize(

		        	array(

			            $this->id,
			            $this->username,
			            $this->password
			            // see section on salt below
			            // $this->salt,
		        	)
	        	);
		    }

		    /** @see \Serializable::unserialize() */
		    public function unserialize($serialized)
		    {
		        list (
		            $this->id,
		            $this->username,
		            $this->password
		            // see section on salt below
		            // $this->salt
		        ) = unserialize($serialized, array('allowed_classes' => false));
		    }
	}