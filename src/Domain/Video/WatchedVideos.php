<?php

namespace Alura\Calisthenics\Domain\Video;

use Countable;
use DateTimeInterface;
use Ds\Map;

class WatchedVideos implements Countable
{
    private Map $videos;

    public function __construct()
    {
        $this->videos = new Map();
    }

    public function add(Video $video, DateTimeInterface $date): WatchedVideos
    {
        $this->videos->put($video, $date);
        return $this;
    }

    public function count(): int
    {
        return $this->videos->count();
    }

    public function dateOfFistVideo(): DateTimeInterface
    {
        $this->videos->sort(
            fn(DateTimeInterface $dateA, DateTimeInterface $dateB) => $dateA <=>
                $dateB
        );

        return $this->videos->first()->value;
    }
}