<?php

	namespace App\Entity;

	use Symfony\Component\Security\Core\User\UserInterface as UserInterface;
	use Doctrine\ORM\Mapping as ORM;

	/**
	 * User entity.
     *
     * @ORM\Entity
	 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
	 * @ORM\Table(name="users")
	 */
	class UserEntity implements UserInterface, \Serializable {

		// prop
		
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
		     * @ORM\Column(name="password", type="string", nullable=false, length=255, unique=true)
		     */
		    private $password;

		    /**
		     * @var string E-mail.
			 *
		     * @ORM\Column(name="email", type="string", nullable=false, length=255, unique=true)
		     */
		    private $email;

	    // get

		    public function getId() {
		    	
		        return $this->id;
		    }

		    public function getName() {

		        return $this->name;
		    }

		    public function getSurname() {

		        return $this->surname;
		    }

		    public function getUsername() {

		        return $this->username;
		    }

		    public function getPassword() {

		        return $this->password;
		    }

		    public function getEmail() {

		        return $this->email;
		    }

		    public function getRoles() {

		        return array('ROLE_USER');
		    }

		    public function getSalt() {

		        return null;
		    }

		    public function eraseCredentials() {}

	    // set

		    public function setId($id_) {
		    	
		        $this->id = $id_;
		    }

		    public function setName($name_) {

		        $this->name = $name_;
		    }

		    public function setSurname($surname_) {

		        $this->surname = $surname_;
		    }

		    public function setUsername($username_) {

		        $this->username = $username_;
		    }

		    public function setPassword($password_) {

		        $this->password = $password_;
		    }

		    public function setEmail($email_) {

		        $this->email = $email_;
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

	    // serialize

		    public function serialize() {

		        return serialize(

		        	[
		        		$this->id,
			            $this->username,
			            $this->password
		        	]
	        	);
		    }

		    public function unserialize($serialized)
		    {
		        list(

		            $this->id,
		            $this->username,
		            $this->password

		        ) = unserialize($serialized, ['allowed_classes' => false]);
		    }
	}