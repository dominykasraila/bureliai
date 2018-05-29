<?php
/** @Entity */
class User {
	/**
	 * @Id @GeneratedValue @Column(type="integer")
	 */
	private $id;

	/**
	 * @Column(type="string", length=50, unique=TRUE)
	 */
	 private $username;

 	/**
 	 * @Column(type="string", length=50)
 	 */
 	private $password;

 	/**
 	 * @ManyToOne(targetEntity="Role")
 	 */
	private $name;

	/**
	 * @Column(type="string", length=50)
	 */
	private $surname;

	/**
	 * @ManyToOne(targetEntity="Role")
	 */
	private $role;


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
     * @return User
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
     * @return User
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
     * Set role.
     *
     * @param \Role|null $role
     *
     * @return User
     */
    public function setRole(\Role $role = null)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role.
     *
     * @return \Role|null
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set username.
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password.
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}
