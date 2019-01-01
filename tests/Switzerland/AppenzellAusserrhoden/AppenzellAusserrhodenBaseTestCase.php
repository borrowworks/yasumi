<?php
/**
 * This file is part of the Yasumi package.
 *
 * Copyright (c) 2015 - 2019 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <stelgenhof@gmail.com>
 */

namespace Yasumi\tests\Switzerland\AppenzellAusserrhoden;

use Yasumi\tests\Switzerland\SwitzerlandBaseTestCase;
use Yasumi\tests\YasumiBase;

/**
 * Base class for test cases of the AppenzellAusserrhoden (Switzerland) holiday provider.
 */
abstract class AppenzellAusserrhodenBaseTestCase extends SwitzerlandBaseTestCase
{
    use YasumiBase;

    /**
     * Name of the region (e.g. country / state) to be tested
     */
    const REGION = 'Switzerland/AppenzellAusserrhoden';

    /**
     * Timezone in which this provider has holidays defined
     */
    const TIMEZONE = 'Europe/Zurich';

    /**
     * Locale that is considered common for this provider
     */
    const LOCALE = 'de_CH';
}
