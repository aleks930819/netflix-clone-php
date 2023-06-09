<?php


/**
 *  Craete a category container
 *  
 */
class CategoryContainer
{

    /** 
     * @var $conn - database connection
     */
    private $conn;

    /** 
     * @var $username - string
     */
    private $username;

    /** 
     * Constructor
     * 
     *  @param $conn - database connection
     *  @param $username - string
     * 
     */
    public function __construct($conn, $username)
    {
        $this->conn = $conn;
        $this->username = $username;
    }

    /** 
     *  Create a category container
     * 
     *  @param $title - string
     *  @param $allCategories - array
     * 
     *  @return string - html
     */


    public function showAllCategories(): string
    {
        $query = $this->conn->prepare("SELECT * FROM categories");
        $query->execute();

        $html = "<div class='preview_categories'>";

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $html .= $this->getCategoryHtml(
                $row,
                null,
                true,
                true
            );
        }


        return $html . "</div>";
    }

    /** 
     *  Create a category container
     * 
     *  @param $sqlData -  array
     *  @param $title - string | null
     *  @param $tvShows - boolean
     *  @param $movies - boolean
     * 
     *  @return string - html
     */

    private function getCategoryHtml($sqlData, $title, $tvShows, $movies)
    {
        $categoryId = $sqlData["id"];
        $title = $title == null ? $sqlData["name"] : $title;

        if ($tvShows && $movies) {
            $entities = EntityProvider::getEntities($this->conn, $categoryId, 30);
        } else if ($tvShows) {
            $entities = EntityProvider::getEntities($this->conn, $categoryId, 30);
        } else {
            $entities = EntityProvider::getEntities($this->conn, $categoryId, 30);
        }

        if (sizeof($entities) == 0) {
            return '';
        }

        $entitiesHtml = "";

        $previewProvider = new PreviewProvider($this->conn, $this->username);

        foreach ($entities as $entity) {
            $entitiesHtml .= $previewProvider->createEntityPreviewSquare($entity);
        }

        return "<div class='category'>
                <a href='category.php?id=$categoryId'> 
                     <h3>$title</h3>
                </a>

                <div class='entities'>
                      $entitiesHtml
                </div>
        </div>
        ";
    }


    public function showCategory($categoryId, $title = null)
    {
        $query = $this->conn->prepare("SELECT * FROM categories WHERE id=:id");
        $query->bindValue(":id", $categoryId);
        $query->execute();

        $html = "<div class='preview_categories'>";

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $html .= $this->getCategoryHtml(
                $row,
                $title,
                true,
                true
            );
        }


        return $html . "</div>";
    }
}
