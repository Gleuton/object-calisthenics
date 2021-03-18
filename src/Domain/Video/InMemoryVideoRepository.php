<?php

namespace Alura\Calisthenics\Domain\Video;

use Alura\Calisthenics\Domain\Student\Student;
use Ds\Map;
use Ds\Sequence;

class InMemoryVideoRepository implements VideoRepository
{
    private VideosList $videos;

    public function __construct()
    {
        $this->videos = new VideosList();
    }

    public function add(Video $video): void
    {
        $this->videos->add($video);
    }

    public function videosFor(Student $student): VideosList
    {
        $today = new \DateTimeImmutable();
        return $this->videos->videosFor($student->getBd()->diff($today)->y);
    }
}
