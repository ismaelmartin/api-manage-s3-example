<?php

namespace Application\Command;

use Infrastructure\Aws\S3\UploadFileService;

final class UploadFileCommandHandler
{
    public function __invoke(UploadFileCommand $command)
    {
        $awsS3 = new UploadFileService($command->bucket());

        return $awsS3->uploadFile($command->filePath(), $command->fileName());
    }
}