<?php

	namespace App\Entity;

	use Doctrine\ORM\Mapping as ORM;

	/**
	 * Event entity.
     *
     * @ORM\Entity
	 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
	 * @ORM\Table(name="events")
	 */
	class EventEntity {

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

	    // get

		    public function getId() {
		    	
		        return $this->id;
		    }

		    public function getTitle() {

		        return $this->title;
		    }

		    public function getDescription() {

		        return $this->description;
		    }

		    public function geDateFrom() {

		        return $this->dateFrom;
		    }

		    public function getDateTo() {

		        return $this->dateTo;
		    }

	    // set

		    public function setId($id_) {
		    	
		        $this->id = $id_;
		    }

		    public function setTitle($title_) {

		        $this->title = $title_;
		    }

		    public function setDescription($description_) {

		        $this->description = $description_;
		    }

		    public function setDateFrom($dateFrom_) {

		        $this->dateFrom = $dateFrom_;
		    }

		    public function setDateTo($dateTo_) {

		        $this->dateTo = $dateTo_;
		    }
	}