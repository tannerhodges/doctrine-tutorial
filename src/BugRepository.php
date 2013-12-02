<?php
/**
 * src/BugRepository.php
 * ---
 * Custom repository for Bug entities with business-specific methods to locate entities.
 */

// Libraries
use Doctrine\ORM\EntityRepository;

class BugRepository extends EntityRepository {

    /**
     * Get recent bugs
     * @param int $number Max number of results to return
     * @return \src\Bug[] An array of Bug instances
     */
    public function getRecentBugs($number = 30) {

        $dql = "SELECT b, e, r FROM Bug b JOIN b.engineer e JOIN b.reporter r ORDER BY b.created DESC";

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setMaxResults($number);
        return $query->getResult();

    } # End getRecentBugs($number = 30)

    /**
     * Get recent bugs
     * @param int $number Max number of results to return
     * @return array An array of hydrated arrays
     */
    public function getRecentBugsArray($number = 30) {

        $dql = "SELECT b, e, r, p FROM Bug b JOIN b.engineer e ".
               "JOIN b.reporter r JOIN b.products p ORDER BY b.created DESC";
        $query = $this->getEntityManager()->createQuery($dql);
        $query->setMaxResults($number);
        return $query->getArrayResult();

    } # End getRecentBugsArray($number = 30)

    /**
     * Get bugs associated with a user
     * @param int $userId Id of user to check bugs for
     * @param int $number Max number of results to return
     * @return \src\Bug[] An array of Bug instances
     */
    public function getUsersBugs($userId, $number = 15) {

        $dql = "SELECT b, e, r FROM Bug b JOIN b.engineer e JOIN b.reporter r ".
               "WHERE b.status = 'OPEN' AND e.id = ?1 OR r.id = ?1 ORDER BY b.created DESC";

        return $this->getEntityManager()->createQuery($dql)
                             ->setParameter(1, $userId)
                             ->setMaxResults($number)
                             ->getResult();

    } # End getUsersBugs($userId, $number = 15)

    /**
     * Get count of open bugs grouped by product
     * @return array Array of products and bug count
     */
    public function getOpenBugsByProduct() {

        $dql = "SELECT p.id, p.name, count(b.id) AS openBugs FROM Bug b ".
               "JOIN b.products p WHERE b.status = 'OPEN' GROUP BY p.id";
        return $this->getEntityManager()->createQuery($dql)->getScalarResult();

    } # End getOpenBugsByProduct()

} # End BugRepository
?>