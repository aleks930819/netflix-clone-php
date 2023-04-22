<?php

class Season
{
    /**
     * @var $seasonNumber - int
     */
    private $seasonNumber;

    /**
     * @var $videos - array
     */

    private $videos;


    /**
     * Constructor
     *
     * @param $seasonNumber - int
     * @param $videos - array
     *
     */

    public function __construct($seasonNumber, $videos)
    {
        $this->seasonNumber = $seasonNumber;
        $this->videos = $videos;
    }


    /**
     *  Get the season number
     *
     *  @return int - season number
     */

    public function getSeasonNumber()
    {
        return $this->seasonNumber;
    }


    /**
     * Get the value of videos
     * 
     * @return array
     */
    public function getVideos()
    {
        return $this->videos;
    }
}
