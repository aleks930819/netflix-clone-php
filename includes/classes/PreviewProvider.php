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
     *  @param $username - user object
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
                    <video autoplay muted class='preview_video' onended='previewEnded()'>
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
     * 
     *  
     * 
     * @param $entity - object 
     * 
     * @return string - html
     */

    public function createEntityPreviewSquare($entity): string
    {

        
        $id = $entity->getId();
        $thumbnail = $entity->getThumbnail();
        $name = $entity->getName();

        return "<a href='entity.php?id=$id'>
                <div class='preview_container small'>
                 <img src='$thumbnail' title='$name' alt='$name'>
                 </div>

          </a> 
        ";
    }




    /** 
     *  Get a random entity
     * 
     *  @return Entity - entity object
     */

    private function getRandomEntity(): Entity
    {
        $entity = EntityProvider::getEntities($this->conn, null, 1);


        return $entity[0];
    }
}
