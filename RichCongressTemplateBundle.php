<?php declare(strict_types=1);

namespace RichCongress\TemplateBundle;

/**
 * Class RichCongressTemplateBundle
 *
 * @package   RichCongress\TemplateBundle
 * @author    Nicolas Guilloux <nguilloux@richcongress.com>
 * @copyright 2014 - 2020 RichCongress (https://www.richcongress.com)
 */
class RichCongressTemplateBundle extends AbstractBundle
{
    public const COMPILER_PASSES = [    ];

    /**
     * @return void
     */
    public function boot(): void
    {
        parent::boot();

        // Autowire everything for the FixturesManager before the first test
        $this->container->get(OverrideServicesUtility::class);
        $this->container->get(FixturesManager::class);
    }
}
