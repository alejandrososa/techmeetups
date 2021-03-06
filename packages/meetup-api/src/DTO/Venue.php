<?php

declare(strict_types=1);

namespace Meetup\DTO;

use Meetup\Hydrator\HydratorFactory;

final class Venue
{
    /** @var string */
    public $id;
    /** @var string */
    public $name;
    /** @var float */
    public $lat;
    /** @var float */
    public $lon;
    /** @var string */
    public $address1;
    /** @var string */
    public $city;
    /** @var string */
    public $country;
    /** @var string */
    public $localizedCountryName;

    public static function fromData(array $data) : self
    {
        return HydratorFactory::create()->hydrate($data, new self());
    }
}
