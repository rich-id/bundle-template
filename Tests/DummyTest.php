<?php declare(strict_types=1);

namespace RichCongress\TemplateBundle\Tests;

use RichCongress\Bundle\UnitBundle\TestCase\TestCase;
use RichCongress\TemplateBundle\RichCongressTemplateBundle;

/**
 * Class DummyTest
 *
 * @package   RichCongress\TemplateBundle\Tests
 * @author    Nicolas Guilloux <nguilloux@richcongress.com>
 * @copyright 2014 - 2020 RichCongress (https://www.richcongress.com)
 */
class DummyTest extends TestCase
{
    public function testInstanciateBundle(): void
    {
        $bundle = new RichCongressTemplateBundle();

        self::assertInstanceOf(RichCongressTemplateBundle::class, $bundle);
    }
}
