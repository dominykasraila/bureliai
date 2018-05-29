<?php
/** @Entity */
class User {
	/**
	 * @Id @GeneratedValue @Column(type="integer")
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
	 * @ManyToOne(targetEntity="Role")
	 */
	private $role;
}
