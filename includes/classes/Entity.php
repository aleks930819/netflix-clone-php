<?php

class Entity
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
    }


    /**
     *  Get the id of the entity
     * 
     *  @return int  - string
     */

    public function getId(): int
    {
        return $this->input["id"];
    }

    /**
     *  Get the name of the entity
     * 
     *  @return string - name
     */

    public function getName(): string
    {
        return $this->input["name"];
    }

    /**
     *  Get the thumbnail of the entity
     * 
     *  @return string - thumbnail
     */

    public function getThumbnail(): string
    {
        return $this->input["thumbnail"];
    }

    /**
     *  Get the preview of the entity
     * 
     *  @return string - preview
     */

    public function getPreview(): string
    {
        return $this->input["preview"];
    }

    /**
     *  Get the id of the category of the entity
     * 
     *  @return int - category id
     */

    public function getCategoryId(): int
    {
        return $this->input["categoryId"];
    }

    /**
     *  Get the category of the entity
     * 
     *  @return array - category
     */


    public function getSeasons(): array
    {

        $query = $this->conn->prepare("SELECT * FROM videos WHERE entityId=:id AND isMovie=0 ORDER BY season, episode ASC");
        $query->bindValue(":id", $this->getId());
        $query->execute();

        $seasons = [];
        $videos = [];
        $currentSeason = null;

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            if ($currentSeason != null && $currentSeason != $row["season"]) {
                $season = new Season($currentSeason, $videos);
                $seasons[] = $season;
                $videos = [];
            }

            $currentSeason = $row["season"];
            $videos[] = new Video($this->conn, $row);
        }

        if (sizeof($videos) != 0) {
            $season = new Season($currentSeason, $videos);
            $seasons[] = $season;
        }

        return $seasons;
    }
}
