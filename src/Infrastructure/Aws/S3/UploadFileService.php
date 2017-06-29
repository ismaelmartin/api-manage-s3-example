<?php

namespace Infrastructure\Aws\S3;

use Domain\Exception\FileNotFoundException;

final class UploadFileService extends AwsS3Service
{
    /**
     * @param string $path
     * @param string $name
     * @return \Aws\Result
     * @throws FileNotFoundException
     */
    public function uploadFile(string $path, string $name)
    {
        if (!file_exists($path)) {
            throw new FileNotFoundException('File does not exists.');
        }

        return $this->client->putObject([
            'Bucket'        => $this->bucket->name(),
            'Key'           => $name,
            'SourceFile'    => $path,
            'ACL'           => 'public-read',
        ]);
    }
}