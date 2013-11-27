<?php
/**
 * src/Bug.php
 * ---
 * Defines the Bug entity.
 */

// Libraries
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity(repositoryClass="BugRepository") @Table(name="bugs")
 */

class Bug {

    /*----------------------------------------------------------------------------------------------------
     * PROPERTIES
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
     * REFERENCE PROPERTIES
     *----------------------------------------------------------------------------------------------------*/

    // Reference to Product entities
    protected $products;

    // References to User entities
    protected $engineer;
    protected $reporter;


    /*----------------------------------------------------------------------------------------------------
     * METHODS
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

    public function getId() {
        return $this->id;
    } # End getId()

    public function getDescription() {
        return $this->description;
    } # End getDescription()

    public function setDescription($description) {
        $this->description = $description;
    } # End setDescription()

    public function setCreated(DateTime $created) {
        $this->created = $created;
    } # End setCreated()

    public function getCreated() {
        return $this->created;
    } # End getCreated()

    public function setStatus($status) {
        $this->status = $status;
    } # End setStatus()

    public function getStatus() {
        return $this->status;
    } # End getStatus()


    /*----------------------------------------------------------------------------------------------------
     * REFERENCE METHODS
     *----------------------------------------------------------------------------------------------------*/

    /**
     * User reference methods
     */
    public function setEngineer($engineer) {
        $engineer->assignedToBug($this);
        $this->engineer = $engineer;
    } # End setEngineer()

    public function setReporter($reporter) {
        $reporter->addReportedBug($this);
        $this->reporter = $reporter;
    } # End setReporter()

    public function getEngineer() {
        return $this->engineer;
    } # End getEngineer()

    public function getReporter() {
        return $this->reporter;
    } # End getReporter()

} # End Bug