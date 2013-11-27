<?php
/**
 * src/Product.php
 * ---
 * Defines the Product entity.
 */
class Product {

    /*----------------------------------------------------------------------------------------------------
     * PROPERTIES
     *  -# $id
     *  -# $name
     *----------------------------------------------------------------------------------------------------*/

    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $name;


    /*----------------------------------------------------------------------------------------------------
     * METHODS
     *  -# $getId
     *  -# $getName
     *  -# $setName
     *----------------------------------------------------------------------------------------------------*/

    /**
     * Return the id of the item
     */
    public function getId() {

        return $this->id;

    } # End getId()

    /**
     * Return the name of the item
     */
    public function getName() {

        return $this->name;

    } # End getName()

    /**
     * Set the name of the item
     */
    public function setName($name) {

        $this->name = $name;

    } # End setName()

} # End Product

?>