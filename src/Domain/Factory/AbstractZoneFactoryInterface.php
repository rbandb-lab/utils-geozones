<?php

namespace MyPrm\GeoZones\Domain\Factory;

use MyPrm\GeoZones\Domain\Model\World;
use MyPrm\GeoZones\SharedKernel\Error\Error;

interface AbstractZoneFactoryInterface
{
    public function build(array $data): World|Error;
    public function instanciate(array $data): \ArrayIterator;
    public function createTable(\ArrayIterator $iterator): World|Error;
    public function createRegions(\ArrayIterator $iterator): \Iterator|Error;
    public function createSubRegions(\ArrayIterator $iterator): \Iterator|Error;
    public function mapCountries(\ArrayIterator $iterator): World|Error;
}