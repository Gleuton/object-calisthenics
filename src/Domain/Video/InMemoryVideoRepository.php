<?php

namespace Alura\Calisthenics\Domain\Video;

use Alura\Calisthenics\Domain\Student\Student;

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
        return $this->videos->videosFor($student->age());
    }
}
