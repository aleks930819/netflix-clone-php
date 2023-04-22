<?php


class SeasonProvider
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
     * @param $conn - database connection
     * @param $username - user object
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

    public function create($entity): string
    {

        $seasons = $entity->getSeasons();
    }
}
