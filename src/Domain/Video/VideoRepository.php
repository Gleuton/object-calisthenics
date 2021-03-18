<?php

namespace Alura\Calisthenics\Domain\Video;

use Alura\Calisthenics\Domain\Student\Student;
use Ds\Sequence;

interface VideoRepository
{
    public function add(Video $video): void;
    public function videosFor(Student $student): VideosList;
}
