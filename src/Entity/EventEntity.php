<?php

	namespace App\Entity;

	use Doctrine\ORM\Mapping as ORM;

	/**
     * @ORM\Entity
	 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
	 * @ORM\Table(name="events")
	 */
	class EventEntity {
		
		/**
		 * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned": true})
	     * @ORM\Id
	     * @ORM\GeneratedValue(strategy="AUTO")
		 */
		private $id;

		/**
	     * @ORM\Column(name="title", type="string", nullable=false, length=255)
	     */
	    private $title;

	    /**
	     * @ORM\Column(name="description", type="string", nullable=true, length=255)
	     */
	    private $description;

		/**
	     * @ORM\Column(name="dateFrom", type="string", nullable=false)
	     */
	    private $dateFrom;

		/**
	     * @ORM\Column(name="dateTo", type="string", nullable=false)
	     */
	    private $dateTo;
		
	    /**
		 * @todo ZROBIĆ JAK BĘDZIE POPRAWNIE DZIAŁAŁO ZAPIS/ODCZYT ZDARZENIA
	     */
	    // private $user_id;

	    public function getId() {
	    	
	        return $this->id;
	    }

	    public function getTitle() {

	        return $this->title;
	    }

	    public function getDescription() {

	        return $this->description;
	    }

	    public function getDateFrom() {

	        return $this->dateFrom;
	    }

	    public function getDateTo() {

	        return $this->dateTo;
	    }

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