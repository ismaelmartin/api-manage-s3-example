<?php

namespace Application\Command;

use Application\Command;
use Application\Dto\BucketDto;

final class ListBucketCommand implements Command
{
    private $bucket;
    private $filter;

    public function __construct(BucketDto $bucket, string $filter = '')
    {
        $this->bucket = $bucket;
        $this->filter = $filter;
    }

    public function bucket(): BucketDto
    {
        return $this->bucket;
    }

    public function filter(): string
    {
        return $this->filter;
    }
}