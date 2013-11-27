<?php
/**
 * src/User.php
 * ---
 * Defines the User entity.
 */

/**
 * @Entity @Table(name="users")
 */

class User {

    /*----------------------------------------------------------------------------------------------------
     * PROPERTIES
     *  -# $id
     *  -# $name
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


    /*----------------------------------------------------------------------------------------------------
     * METHODS
     *  -# getId()
     *  -# getName()
     *  -# setName()
     *----------------------------------------------------------------------------------------------------*/

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