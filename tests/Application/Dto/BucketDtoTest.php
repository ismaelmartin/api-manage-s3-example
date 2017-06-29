<?php

namespace Application\Dto;

class BucketDtoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testConstructAndGetters()
    {
        $name       = 'name';
        $key        = 'key';
        $secret     = 'secret';
        $region     = 'region';
        $version    = 'version';
        $profile    = 'profile';

        $bucket = new BucketDto(
            $name,
            $key,
            $secret,
            $region,
            $version,
            $profile
        );

        $this->assertEquals($name, $bucket->name());
        $this->assertEquals($key, $bucket->key());
        $this->assertEquals($secret, $bucket->secret());
        $this->assertEquals($region, $bucket->region());
        $this->assertEquals($version, $bucket->version());
        $this->assertEquals($profile, $bucket->profile());
    }
}