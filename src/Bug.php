<?php
/**
 * src/Bug.php
 * ---
 * Defines the Bug entity.
 */

/**
 * @Entity(repositoryClass="BugRepository") @Table(name="bugs")
 */

class Bug {

    /*----------------------------------------------------------------------------------------------------
     * PROPERTIES
     *  -# $id
     *  -# $description
     *  -# $created
     *  -# $status
     *----------------------------------------------------------------------------------------------------*/

    /**
     * @Id @Column(type="integer") @GeneratedValue
     */
    protected $id;

    /**
     * @Column(type="string")
     */
    protected $description;

    /**
     * @Column(type="datetime")
     */
    protected $created;

    /**
     * @Column(type="string")
     */
    protected $status;


    /*----------------------------------------------------------------------------------------------------
     * METHODS
     *  -# getId()
     *  -# getDescription()
     *  -# setDescription()
     *  -# setCreated()
     *  -# getCreated()
     *  -# setStatus()
     *  -# getStatus()
     *----------------------------------------------------------------------------------------------------*/

    /**
     * getId()
     */
    public function getId() {

        return $this->id;

    } # End getId()

    /**
     * getDescription()
     */
    public function getDescription() {

        return $this->description;

    } # End getDescription()

    /**
     * description)
     */
    public function setDescription($description) {

        $this->description = $description;

    } # End description)

    /**
     * created)
     */
    public function setCreated(DateTime $created) {

        $this->created = $created;

    } # End created)

    /**
     * getCreated()
     */
    public function getCreated() {

        return $this->created;

    } # End getCreated()

    /**
     * status)
     */
    public function setStatus($status) {

        $this->status = $status;

    } # End status)

    /**
     * getStatus()
     */
    public function getStatus() {

        return $this->status;

    } # End getStatus()

} # End Bug