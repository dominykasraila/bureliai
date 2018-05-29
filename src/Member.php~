<?php
/** @Entity */
class Member {
	/**
	* @GeneratedValue @Id @Column(type="integer")
	*/
	private $id;

	/**
	* @Column(type="string", length=50)
	*/
	private $name;

	/**
	* @Column(type="string", length=50)
	*/
	private $surname;

	/**
	 * @ManyToOne(targetEntity="Club")
	 */
	private $club;

    /**
     * Get id.
     *
     * @return \id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Member
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname.
     *
     * @param string $surname
     *
     * @return Member
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname.
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set club.
     *
     * @param \Club|null $club
     *
     * @return Member
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
}
