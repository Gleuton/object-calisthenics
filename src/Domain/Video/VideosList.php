<?php


namespace Alura\Calisthenics\Domain\Video;

use Countable;

class VideosList implements Countable
{
    private array $videos = [];

    public function __construct(array $videos = [])
    {
        foreach ($videos as $video){
            $this->add($video);
        }
    }

    public function add(Video $video): VideosList
    {
        $this->videos[] = $video;
        return $this;
    }

    public function videosFor(int $age): VideosList
    {
        $videos = array_filter(
            $this->videos,
            static fn(Video $video) => $video->getAgeLimit() <= $age
        );
        return new self($videos);
    }

    public function count(): int
    {
        return count($this->videos);
    }

    public function values(): array
    {
        return $this->videos;
    }
}