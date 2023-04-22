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
}
