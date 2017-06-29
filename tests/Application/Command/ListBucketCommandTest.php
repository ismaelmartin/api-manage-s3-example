<?php

namespace Application\Command;

use Application\Dto\BucketDto;

class ListBucketCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testConstructAndGetters()
    {
        $bucket = new BucketDto(
            'name',
            'key',
            'secret',
            'region',
            'version',
            'profile'
        );
        $filter = 'filter';
        $command = new ListBucketCommand($bucket, $filter);

        $this->assertEquals($bucket, $command->bucket());
        $this->assertEquals($filter, $command->filter());
    }
}