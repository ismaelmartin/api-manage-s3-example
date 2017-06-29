<?php

namespace Infrastructure\Aws\S3;

use Application\Dto\BucketDto;
use Aws\Sdk;

abstract class AwsS3Service
{
    protected $client;
    protected $bucket;

    public function __construct(BucketDto $bucket)
    {
        $this->bucket = $bucket;

        $sdk = new Sdk([
            'credentials' => [
                'key'       => $bucket->key(),
                'secret'    => $bucket->secret(),
            ],
            'region'    => $bucket->region(),
            'version'   => $bucket->version(),
        ]);
        $this->client = $sdk->createS3();
    }
}