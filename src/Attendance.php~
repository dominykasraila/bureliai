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
}
