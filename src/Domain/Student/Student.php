<?php

namespace Alura\Calisthenics\Domain\Student;

use Alura\Calisthenics\Domain\Address\Address;
use Alura\Calisthenics\Domain\Email\Email;
use Alura\Calisthenics\Domain\Video\Video;
use Alura\Calisthenics\Domain\Video\WatchedVideos;
use DateTimeImmutable;
use DateTimeInterface;

class Student
{
    private Email $email;
    private DateTimeInterface $birthDate;
    private WatchedVideos $watchedVideos;
    private FullName $fullName;
    public Address $address;

    public function __construct(
        Email $email,
        DateTimeInterface $birthDate,
        FullName $fullName,
        Address $address
    ) {
        $this->watchedVideos     = new WatchedVideos();
        $this->email             = $email;
        $this->birthDate         = $birthDate;
        $this->fullName          = $fullName;
        $this->address           = $address;
    }

    public function Email(): string
    {
        return $this->email;
    }

    public function fullName(): string
    {
        return (string) $this->fullName;
    }

    public function birthDate(): DateTimeInterface
    {
        return $this->birthDate;
    }

    public function watch(Video $video, DateTimeInterface $date): void
    {
        $this->watchedVideos->add($video, $date);
    }

    public function hasAccess(): bool
    {
        if ($this->watchedVideos->count() === 0) {
            return true;
        }

        $firstDate = $this->watchedVideos->dateOfFistVideo();
        $today     = new DateTimeImmutable();

        return $firstDate->diff($today)->days < 90;
    }

    public function age(): int
    {
        $today = new DateTimeImmutable();
        return $this->birthDate()->diff($today)->y;
    }
}
