<?php
/** @Entity */
class Club {
	/**
	 * @Id @GeneratedValue @Column(type="integer")
	 */
	private $id;

	/**
	 * @Column(type="string", length=50)
	 */
	private $name;

	/**
	 * @OneToOne(targetEntity="User")
	 */
	private $supervisor;

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
     * Set name.
     *
     * @param string $name
     *
     * @return Club
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
     * Set supervisor.
     *
     * @param \User|null $supervisor
     *
     * @return Club
     */
    public function setSupervisor(\User $supervisor = null)
    {
        $this->supervisor = $supervisor;

        return $this;
    }

    /**
     * Get supervisor.
     *
     * @return \User|null
     */
    public function getSupervisor()
    {
        return $this->supervisor;
    }
}
