<?php

namespace Infrastructure\Aws\S3;

final class ListFilesService extends AwsS3Service
{
    /**
     * @return mixed|null
     */
    public function list()
    {
        return $this
            ->client
            ->listObjects(
                [
                    'Bucket' => $this->bucket->name(),
                ]
            )
            ->get('Contents');
    }
}