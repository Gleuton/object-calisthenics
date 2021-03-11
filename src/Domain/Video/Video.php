<?php

namespace Alura\Calisthenics\Domain\Video;

class Video
{
    private bool $isVisible = false;
    private int $ageLimit;

    public function publish(): void
    {
        $this->isVisible = true;
    }

    public function isPublic(): bool
    {
        return $this->isVisible;
    }

    public function getAgeLimit(): int
    {
        return $this->ageLimit;
    }

    public function setAgeLimit(int $ageLimit): void
    {
        $this->ageLimit = $ageLimit;
    }
}
