<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\Integration\Test\Unit\Model\Config\Consolidated;

use Magento\Framework\Module\Dir\Reader;
use Magento\Integration\Model\Config\Consolidated\SchemaLocator;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class SchemaLocatorTest extends TestCase
{
    /** @var Reader|MockObject */
    protected $moduleReader;

    /** @var string */
    protected $moduleDir;

    /** @var SchemaLocator */
    protected $schemaLocator;

    protected function setUp(): void
    {
        $this->moduleDir = 'moduleDirectory';
        $this->moduleReader = $this->createMock(Reader::class);
        $this->moduleReader->expects($this->any())
            ->method('getModuleDir')
            ->willReturn($this->moduleDir);
        $this->schemaLocator = new SchemaLocator($this->moduleReader);
    }

    public function testGetSchema()
    {
        $this->assertEquals($this->moduleDir . '/integration/integration.xsd', $this->schemaLocator->getSchema());
    }

    public function testGetPerFileSchema()
    {
        $this->assertEquals(
            $this->moduleDir . '/integration/integration_file.xsd',
            $this->schemaLocator->getPerFileSchema()
        );
    }
}