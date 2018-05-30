<?php
/** @Entity */
class Attendance {
	/**
	 * @Id @GeneratedValue @Column(type="integer")
	 */
	private $id;

	/**
	 * @ManyToOne(targetEntity="Activity")
	 */
	private $activity;

	/**
	 * @ManyToOne(targetEntity="Member")
	 */
	private $member;

	/**
	 * @Column(type="smallint")
	 */
	private $hasAttended;

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
     * Set activity.
     *
     * @param \Activity|null $activity
     *
     * @return Attendance
     */
    public function setActivity(\Activity $activity = null)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get activity.
     *
     * @return \Activity|null
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * Set member.
     *
     * @param \Member|null $member
     *
     * @return Attendance
     */
    public function setMember(\Member $member = null)
    {
        $this->member = $member;

        return $this;
    }

    /**
     * Get member.
     *
     * @return \Member|null
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * Set hasAttended.
     *
     * @param int $hasAttended
     *
     * @return Attendance
     */
    public function setHasAttended($hasAttended)
    {
        $this->hasAttended = $hasAttended;

        return $this;
    }

    /**
     * Get hasAttended.
     *
     * @return int
     */
    public function getHasAttended()
    {
        return $this->hasAttended;
    }
}
