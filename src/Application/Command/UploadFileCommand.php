<?php

namespace Application\Command;

use Application\Command;
use Application\Dto\BucketDto;

final class UploadFileCommand implements Command
{
    private $filePath;
    private $fileName;
    private $bucket;

    public function __construct(string $filePath, string $fileName, BucketDto $bucket)
    {
        $this->filePath = $filePath;
        $this->fileName = $fileName;
        $this->bucket = $bucket;
    }

    public function filePath(): string
    {
        return $this->filePath;
    }

    public function fileName(): string
    {
        return $this->fileName;
    }

    public function bucket(): BucketDto
    {
        return $this->bucket;
    }
}