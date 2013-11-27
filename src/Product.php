<?php
/**
 * src/Product.php
 * ---
 * Defines the Product entity.
 */

/**
 * Docblock Annotation
 * @see vendor\doctrine\annotations\lib\Doctrine\Common\Annotations
 * @see http://docs.doctrine-project.org/en/2.0.x/reference/basic-mapping.html
 * @see http://docs.doctrine-project.org/en/latest/reference/annotations-reference.html
 * ---
 * @Entity                 // By default, the entity will be persisted to a table with the same name as the class name.
 * @Table(name="products") // Now instances of your class will be persisted to the specified table.
 */

class Product {

    /*----------------------------------------------------------------------------------------------------
     * PROPERTIES
     *  -# $id
     *  -# $name
     *----------------------------------------------------------------------------------------------------*/

    /**
     * @Id                     // Marks this property as the entity identifier, the primary key in the database.
     * @Column(type="integer") // Marks this property for relational persistence. Maps the field 'id' to the column with the same name (i.e., 'id') by default. Uses the mapping type 'integer'.
     * @GeneratedValue         // Tells Doctrine to automatically generate a value for the identifier ('strategy' arg defaults to 'AUTO').
     */
    protected $id;

	/**
     * @Column // Maps the field 'name' to the column 'name'. Type defaults to 'string'.
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