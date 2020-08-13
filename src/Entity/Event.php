<?php

	declare(strict_types=1);

	namespace App\Entity;

	use Doctrine\ORM\Mapping as ORM;

	/**
	 * Event entity.
     *
     * @ORM\Entity
	 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
	 * @ORM\Table(name="events")
     *
     * @author Karolina Dąblowska
	 */
	class EventEntity {

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
		     * @var string Title.
		     *
		     * @ORM\Column(name="title", type="string", nullable=false, length=255)
		     */
		    private $title;

		    /**
		     * @var string Description.
			 *
		     * @ORM\Column(name="description", type="string", nullable=true, length=255)
		     */
		    private $description;

			/**
		     * @var int Date from.
		     *
		     * @ORM\Column(name="dateFrom", type="int", nullable=false)
		     */
		    private $dateFrom;

			/**
			 * @var int Date to.
			 *
		     * @ORM\Column(name="dateTo", type="int", nullable=false)
		     */
		    private $DateTo;
			
		    /**
		     * @var int User id.
			 *
			 * @todo ZROBIĆ JAK BĘDZIE POPRAWNIE DZIAŁAŁO ZAPIS/ODCZYT ZDARZENIA
		     */
		    // private $user_id;

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
		     * Get title.
		     *
		     * @return string
		     */
		    public function getTitle(): string {

		        return $this->title;
		    }

		    /**
		     * Get description.
		     *
		     * @return string
		     */
		    public function getDescription(): string {

		        return $this->description;
		    }

		    /**
		     * Get date from.
		     *
		     * @return int
		     */
		    public function geDateFrom(): int {

		        return $this->dateFrom;
		    }

		    /**
		     * Get date to.
		     *
		     * @return int
		     */
		    public function getDateTo(): int {

		        return $this->dateTo;
		    }

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
		     * Set title.
		     *
		     * @param string $title_ Title.
		     *
		     * @return $this
		     */
		    public function setTitle(string $title_ = "") {

		        $this->title = $title_;

		        return $this;
		    }

		    /**
		     * Set description.
		     *
		     * @param string $description_ Description.
		     *
		     * @return $this
		     */
		    public function setDescription(string $description_ = "") {

		        $this->description = $description_;

		        return $this;
		    }

		    /**
		     * Set date from.
		     *
		     * @param int $dateFrom_ Date from.
		     *
		     * @return $this
		     */
		    public function setDateFrom(string $dateFrom_ = "") {

		        $this->dateFrom = $dateFrom_;

		        return $this;
		    }

		    /**
		     * Set date to.
		     *
		     * @param int $dateTo_ Date to.
		     *
		     * @return $this
		     */
		    public function setDateTo(string $dateTo_ = "") {

		        $this->dateTo = $dateTo_;

		        return $this;
		    }
	}