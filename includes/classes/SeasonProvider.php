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

        if (sizeof($seasons) == 0) {
            return '';
        }

        $seasonsHtml = '';
        foreach ($seasons as $season) {
            $seasonNumber = $season->getSeasonNumber();
            $videos = $season->getVideos();

            $seasonsHtml .= "<div class='season'>
                        <h3>Season $seasonNumber</h3>
                        <div class='videos'>";
            foreach ($videos as $video) {
                $seasonsHtml .= $this->createSeasonVideoSquare($video);
            }
            $seasonsHtml .= "</div>
                    </div>";

            return $seasonsHtml;
        }
    }

    /**
     *  Create a video square
     *
     *  @param $video - video object
     *
     *  @return string - html
     */
    private function createSeasonVideoSquare($video): string
    {
        $id = $video->getId();
        $title = $video->getTitle();
        $thumbnail = $video->getThumbnail();
        $episodeNumber = $video->getEpisodeNumber();
        $description = $video->getDescription();

        return "<a href='watch.php?id=$id'>
                    <div class='episode_container'>
                        <div class='contents'>
                            <img src='$thumbnail' class='episode_thumbnail'>
                            <div class='video_info'>
                                <h4>$episodeNumber. $title</h4>
                                <span>$description</span>
                            </div>
                        </div>
                    </div>
                </a>";
    }
}
