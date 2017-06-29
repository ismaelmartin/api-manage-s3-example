<?php

namespace Infrastructure\Aws\S3;

final class GetUrlService extends AwsS3Service
{
    public function url($file)
    {
        return $this->client->getObjectUrl($this->bucket->name(), $file['Key']);
    }
}