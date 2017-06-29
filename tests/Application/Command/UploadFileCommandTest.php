<?php

namespace Application\Command;

use Application\Dto\BucketDto;

class UploadFileCommandTest extends \PHPUnit_Framework_TestCase
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
        $filePath = 'file_path';
        $fileName = 'file_name';
        $command = new UploadFileCommand($filePath, $fileName, $bucket);

        $this->assertEquals($filePath, $command->filePath());
        $this->assertEquals($fileName, $command->fileName());
        $this->assertEquals($bucket, $command->bucket());
    }
}