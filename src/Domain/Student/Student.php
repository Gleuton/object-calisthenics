<?php

namespace Alura\Calisthenics\Domain\Student;

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
    public string $street;
    public string $number;
    public string $province;
    public string $city;
    public string $state;
    public string $country;
    private FullName $fullName;

    public function __construct(
        Email $email,
        DateTimeInterface $birthDate,
        FullName $fullName,
        string $street,
        string $number,
        string $province,
        string $city,
        string $state,
        string $country
    ) {
        $this->watchedVideos       = new WatchedVideos();
        $this->email               = $email;
        $this->birthDate           = $birthDate;
        $this->street              = $street;
        $this->number              = $number;
        $this->province            = $province;
        $this->city                = $city;
        $this->state               = $state;
        $this->country             = $country;
        $this->fullName            = $fullName;
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
