<?php
/** @Entity */
class Activity {
	/**
	 * @Id @GeneratedValue @Column(type="integer")
	 */
	private $id;

	/**
	 * @Column(type="date")
	 */
	private $date;

	/**
	 * @Column(type="string", length=50)
	 */
	private $description;

	/**
	 * @ManyToOne(targetEntity="Club")
	 */
	private $club;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set datetime.
     *
     * @param \DateTime $datetime
     *
     * @return Activity
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime.
     *
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return Activity
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set club.
     *
     * @param \Club|null $club
     *
     * @return Activity
     */
    public function setClub(\Club $club = null)
    {
        $this->club = $club;

        return $this;
    }

    /**
     * Get club.
     *
     * @return \Club|null
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return Activity
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}
