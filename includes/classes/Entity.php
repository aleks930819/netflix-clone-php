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
}
