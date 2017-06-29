<?php

namespace Application\Dto;

final class BucketDto
{
    private $name;
    private $key;
    private $secret;
    private $region;
    private $version;
    private $profile;

    public function __construct(
        string $name,
        string $key,
        string $secret,
        string $region,
        string $version,
        string $profile
    ) {
        $this->name = $name;
        $this->key = $key;
        $this->secret = $secret;
        $this->region = $region;
        $this->version = $version;
        $this->profile = $profile;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function key(): string
    {
        return $this->key;
    }

    public function secret(): string
    {
        return $this->secret;
    }

    public function region(): string
    {
        return $this->region;
    }

    public function version(): string
    {
        return $this->version;
    }

    public function profile(): string
    {
        return $this->profile;
    }
}