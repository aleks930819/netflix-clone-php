<?php


/**
 *  This class is used to create a preview video
 *  
 */
class PreviewProvider
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
     *  @param $userLoggedInObj - user object
     * 
     */
    public function __construct($conn, $username)
    {
        $this->conn = $conn;
        $this->username = $username;
    }

    /** 
     *  Create a preview video
     * 
     *  @param $entity - entity object
     * 
     *  @return string - html
     */

    public function createPreviewVideo($entity)
    {
        if ($entity == null) {
            $entity = $this->getRandomEntity();
        }

        $id = $entity->getId();
        $name = $entity->getName();
        $preview = $entity->getPreview();
        $thumbnail = $entity->getThumbnail();




        return "<div class='preview_container'>
                    <img src='$thumbnail' class='preview_image' hidden>
                    <video autoplay muted class='preview_video'>
                        <source src='$preview' type='video/mp4'>
                    </video>
                    <div class='preview_overlay'>
                        <div class='main_details'>
                            <h3>$name</h3>
                            <div class='buttons'>
                                <button><i class='fas fa-play'></i> Play</button>
                                <button
                                 onclick='volumeToggle(this)'
                                ><i class='fas fa-volume-mute'></i></button>
                            </div>
                        </div>
                    </div>
                    </div>";
    }









    /** 
     *  Get a random entity
     * 
     *  @return Entity - entity object
     */

    private function getRandomEntity(): Entity
    {
        $entity = null;

        $query = $this->conn->prepare("SELECT * FROM entities ORDER BY RAND() LIMIT 1");

        $query->execute();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $entity = new Entity($this->conn, $row);
        }

        return $entity;
    }
}
