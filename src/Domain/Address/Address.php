<?php


namespace Alura\Calisthenics\Domain\Address;


class Address
{

    public string $country;
    public string $number;
    public string $province;
    public string $city;
    public string $street;
    public string $state;

    public function __construct(
        string $country,
        string $number,
        string $province,
        string $city,
        string $street,
        string $state
    ) {
        $this->country = $country;
        $this->number = $number;
        $this->province = $province;
        $this->city = $city;
        $this->street = $street;
        $this->state = $state;
    }
}