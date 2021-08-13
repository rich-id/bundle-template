<?php

declare(strict_types=1);

namespace RichId\TemplateBundle\Tests;

use RichCongress\TestFramework\TestConfiguration\Annotation\TestConfig;
use RichCongress\TestSuite\TestCase\TestCase;
use RichId\TemplateBundle\DependencyInjection\Configuration;
use RichId\TemplateBundle\RichIdTemplateBundle;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * Class DummyTest.
 *
 * @author    Nicolas Guilloux <nguilloux@rich-id.com>
 * @copyright 2014 - 2020 RichId (https://www.rich-id.com)
 *
 * @covers \RichId\TemplateBundle\RichIdTemplateBundle
 */
class DummyTest extends TestCase
{
    public function testInstantiateBundle(): void
    {
        $bundle = new RichIdTemplateBundle();

        self::assertInstanceOf(RichIdTemplateBundle::class, $bundle);
    }

    /** @TestConfig("container") */
    public function testCanInstantiateContainer(): void
    {
        /** @var ParameterBagInterface $parameterBag */
        $parameterBag = $this->getService(ParameterBagInterface::class);

        self::assertInstanceOf(ParameterBagInterface::class, $parameterBag);
        self::assertNotNull($parameterBag->get(Configuration::CONFIG_NODE));
    }
}
