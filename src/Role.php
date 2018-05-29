<?php
/** @Entity */
class Role {
	/**
	 * @Id @GeneratedValue @Column(type="integer")
	 */
	private $id;
	/**
	 * @Column(type="string", length=50)
	 */
	private $name;
}
