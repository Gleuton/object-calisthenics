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
    private string $firstName;
    private string $lastName;
    public string $street;
    public string $number;
    public string $province;
    public string $city;
    public string $state;
    public string $country;

    public function __construct(
        Email $email,
        DateTimeInterface $birthDate,
        string $firstName,
        string $lastName,
        string $street,
        string $number,
        string $province,
        string $city,
        string $state,
        string $country
    ) {
        $this->watchedVideos = new WatchedVideos();
        $this->email         = $email;
        $this->birthDate     = $birthDate;
        $this->firstName     = $firstName;
        $this->lastName      = $lastName;
        $this->street        = $street;
        $this->number        = $number;
        $this->province      = $province;
        $this->city          = $city;
        $this->state         = $state;
        $this->country       = $country;
    }

    public function fullName(): string
    {
        return "{$this->firstName} {$this->lastName}";
    }

    public function Email(): string
    {
        return $this->email;
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
        $today = new \DateTimeImmutable();
        return $this->birthDate()->diff($today)->y;
    }
}
