<?php

/**
 *  Create a video
 *  
 */
class Video
{
    /**
     * @var $conn - database connection
     */
    private $conn;

    /**
     * @var $input - int || object || string
     */
    private $input;


    /**
     * @var $entity - object
     */
    private $entity;

    /**
     * Constructor
     * 
     * @param $conn - database connection
     * 
     * @param $input - int || object || string 
     * 
     */


    public function __construct($conn, $input)
    {
        $this->conn = $conn;

        if (is_array($input)) {
            $this->input = $input;
        } else {
            $query = $this->conn->prepare("SELECT * FROM entities WHERE id=:id");
            $query->bindValue(":id", $input);
            $query->execute();

            $this->input = $query->fetch(PDO::FETCH_ASSOC);
        }
        $this->entity = new Entity($this->conn, $this->input['entityId']);
    }


    /**
     *  Get the id of the video
     * 
     *  @return int  - string
     */

    public function getId(): int
    {
        return $this->input["id"];
    }

    /**
     *  Get the title of the video
     * 
     *  @return string - name
     */

    public function getTitle(): string
    {
        return $this->input["title"];
    }

    /**
     *  Get the description of the video
     * 
     *  @return string - description
     */

    public function getDescription(): string
    {
        return $this->input["description"];
    }

    /**
     *  Get the filepath of the video
     * 
     *  @return string - filepath
     */

    public function getFilePath(): string
    {
        return $this->input["filePath"];
    }

    /**
     *  Get the thumbnail of the video
     * 
     *  @return string - thumbnail
     */

    public function getThumbnail(): string
    {
        return $this->entity->getThumbnail();
    }

    /**
     *  Get the episode number 
     * 
     *  @return string - episode number
     */

    public function getEpisodeNumber(): string
    {
        return $this->input["episode"];
    }
}
