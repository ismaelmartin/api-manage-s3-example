<?php

namespace Application\Command;

use Infrastructure\Aws\S3\GetUrlService;
use Infrastructure\Aws\S3\ListFilesService;

final class ListBucketCommandHandler
{
    public function __invoke(ListBucketCommand $command)
    {
        $awsS3List = new ListFilesService($command->bucket());
        $awsS3Url = new GetUrlService($command->bucket());;
        $list = [];

        $s3Files = $awsS3List->list();
        foreach ($s3Files as $file) {
            $list[$file['Key']] = $awsS3Url->url($file);
        }

        return $list;
    }
}