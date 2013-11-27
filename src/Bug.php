<?php
/**
 * src/Bug.php
 * ---
 * Defines the Bug entity.
 *
 * @todo Document methods
 */

// Libraries
use Doctrine\Common\Collections\ArrayCollection;

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
     *  -# $products
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

    // Reference to Product entities
    protected $products;

    // References to User entities
    protected $engineer;
    protected $reporter;


    /*----------------------------------------------------------------------------------------------------
     * METHODS
     *  -# __construct()
     *  -# getId()
     *  -# getDescription()
     *  -# setDescription()
     *  -# setCreated()
     *  -# getCreated()
     *  -# setStatus()
     *  -# getStatus()
     *----------------------------------------------------------------------------------------------------*/

    /**
     * Initialize new Bug instances
     * @see http://www.php.net/manual/en/language.oop5.decon.php
     */
    public function __construct() {

        // Use ArrayCollection to initialize the products property
        // "... a Collection implementation that wraps a regular PHP array"
        // @see vendor\doctrine\collections\lib\Doctrine\Common\Collections\ArrayCollection
        $this->products = new ArrayCollection();

    } # End __construct()

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


    /**
     * User reference methods
     */
    public function setEngineer($engineer) {
        $engineer->assignedToBug($this);
        $this->engineer = $engineer;
    }

    public function setReporter($reporter) {
        $reporter->addReportedBug($this);
        $this->reporter = $reporter;
    }

    public function getEngineer() {
        return $this->engineer;
    }

    public function getReporter() {
        return $this->reporter;
    }

} # End Bug