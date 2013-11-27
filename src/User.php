<?php
/**
 * src/User.php
 * ---
 * Defines the User entity.
 *
 * @todo Document methods
 */

// Libraries
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="users")
 */

class User {

    /*----------------------------------------------------------------------------------------------------
     * PROPERTIES
     *  -# $id
     *  -# $name
     *  -# $reportedBugs
     *  -# $assignedBugs
     *----------------------------------------------------------------------------------------------------*/

    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     */
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $name;

    // References to Bug entities
    protected $reportedBugs;
    protected $assignedBugs;


    /*----------------------------------------------------------------------------------------------------
     * METHODS
     *  -# __construct()
     *  -# getId()
     *  -# getName()
     *  -# setName()
     *----------------------------------------------------------------------------------------------------*/

    /**
     * Initialize new User instances
     * @see http://www.php.net/manual/en/language.oop5.decon.php
     */
    public function __construct() {

        // Use ArrayCollection to hold Bug references
        // @see vendor\doctrine\collections\lib\Doctrine\Common\Collections\ArrayCollection
        $this->reportedBugs = new ArrayCollection();
        $this->assignedBugs = new ArrayCollection();

    } # End __construct()

    /**
     * getId()
     */
    public function getId() {

        return $this->id;

    } # End getId()

    /**
     * getName()
     */
    public function getName() {

        return $this->name;

    } # End getName()

    /**
     * setName($name)
     */
    public function setName($name) {

        $this->name = $name;

    } # End setName($name)

} # End User