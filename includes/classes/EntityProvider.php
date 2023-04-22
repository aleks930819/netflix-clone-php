<?php


/**
 *  Provides entities 
 * 
 */
class EntityProvider
{

    /** 
     * @var $conn - database connection
     */
    private $conn;

    /**
     * @var $categoryid - int
     */

    private $categoryId;

    /**
     *  @var $limit - int
     */

    private $limit;

    /** 
     *  Get entities from database and return them as an array
     * 
     *  @param $conn - database connection
     *  @param $categoryId - int
     *  @param $limit - int
     * 
     * 
     * @return array - array of entities
     * 
     */
    public static function getEntities($conn, $categoryId, $limit): array
    {

        $sql = "SELECT * FROM entities";

        if ($categoryId != null) {
            $sql .= " WHERE categoryId=:categoryId";
        }

        $sql .= " ORDER BY RAND() LIMIT :limit";

        $query = $conn->prepare($sql);

        if ($categoryId != null) {
            $query->bindValue(":categoryId", $categoryId);
        }

        $query->bindValue(":limit", $limit, PDO::PARAM_INT);
        $query->execute();

        $results = [];

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $results[] = new Entity($conn, $row);
        }

        return $results;
    }
}
