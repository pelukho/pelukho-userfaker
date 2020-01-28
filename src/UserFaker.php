<?php

declare(strict_types=1);

namespace pelukho\userfaker\src;

use pelukho\userfaker\src\UserFakerApi;

class UserFaker
{
    private array $userData;
    protected ?string $gender;
    protected ?string $nationality;

    public function __construct(?string $gender = null, ?string $nationality = null)
    {
        $this->gender = $gender;
        $this->nationality = $nationality;
        $this->userData = $this->getUserData();
    }

    public function getUserData()
    {
        $data = new UserFakerApi($this->gender, $this->nationality);
        $data = $data->getUserData();

        return $data['results'];
    }

    public function getUserFullName(): string
    {
        $name = $this->userData[0]['name'];

        return sprintf(
            '%s %s',
            $name['first'],
            $name['last']
        );
    }

    public function getUserName(): string
    {
        $name = $this->userData[0]['name'];

        return $name['first'];
    }

    public function getUserSurname(): string
    {
        $name = $this->userData[0]['name'];

        return $name['last'];
    }

    public function getUseremail(): string
    {
        $providers = array('@gmail.com', '@outlook.com', '@yahoo.com', '@aol.com', '@icloud.com');

        return \str_replace('@example.com', $providers[\rand(0, 4)], $this->userData[0]['email']);
    }

    public function getUserThumbnail($size = null): string
    {
        $sizes = array('large', 'medium', 'thumbnail');

        if (in_array($size, $sizes)) {
            return $this->userData[0]['picture'][$size];
        } else {
            return $this->userData[0]['picture']['thumbnail'];
        }
    }

    public function getUserSellPhone(): string
    {
        return $this->userData[0]['cell'];
    }
}
