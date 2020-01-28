<?php

declare(strict_types=1);

namespace pelukho\userfaker\src;


class UserFakerApi
{
    private ?string $gender;
    private ?string $nationality;
    private $ch = null;
    public array $userData = array();

    private const API_URL = 'https://randomuser.me/api/?format=json';

    public function __construct(?string $gender = null, ?string $nationality = null)
    {
        $this->gender = $gender;
        $this->nationality = $nationality;
    }

    public function getUserData(): array
    {
        $genderParam = $this->isValidGender() ? '&gender=' . $this->gender : '';
        $nationalityParam = $this->isNationalityAvailable() ? '&nat=' . $this->nationality : '';

        $this->ch = \curl_init();
        \curl_setopt($this->ch, CURLOPT_URL, self::API_URL . $genderParam . $nationalityParam);
        \curl_setopt($this->ch, CURLOPT_HEADER, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)");
        \curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);

        $this->userData = \json_decode(\curl_exec($this->ch), true);

        \curl_close($this->ch);

        return $this->userData;
    }

    private function isNationalityAvailable(): bool
    {
        if (\is_null($this->nationality)) return false;

        return \in_array(\strtoupper($this->nationality),
            array(
                'AU', 'BR', 'CA', 'CH',
                'DE', 'DK', 'ES', 'FI',
                'FR', 'GB', 'IE', 'IR',
                'NO', 'NL', 'NZ', 'TR', 'US'
            )
        );
    }

    private function isValidGender(): bool
    {
        if (\is_null($this->gender)) return false;

        switch (\strtolower($this->gender)) {
            case 'female':
            case 'f':
                $this->gender = 'female';
                return true;
            case 'male':
            case 'm':
                $this->gender = 'male';
                return true;
            default:
                return false;
        }
    }
}
