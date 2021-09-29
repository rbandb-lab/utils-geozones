<?php

namespace MyPrm\GeoZones\Infrastructure\Service\Data\File\Cache\Adapter;

use MyPrm\GeoZones\Domain\Service\Data\File\Cache\CacheAdapterInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class FsAdapter implements CacheAdapterInterface
{
    private FilesystemAdapter $adapter;

    public function __construct(FilesystemAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function save(string $fileName, mixed $content, int $cacheTtl)
    {
        $item =  $this->adapter->getItem($fileName);
        $item->set($content);
        $item->expiresAfter($cacheTtl);
        $this->adapter->save($item);
    }

    public function delete(string $fileName)
    {
        $this->adapter->deleteItem($fileName);
    }
}