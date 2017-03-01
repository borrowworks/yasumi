<?php
/**
 * This file is part of the Yasumi package.
 *
 * Copyright (c) 2015 - 2017 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <stelgenhof@gmail.com>
 */

namespace Yasumi\tests\Switzerland\Thurgau;

use Yasumi\Holiday;

/**
 * Class for testing holidays in Thurgau (Switzerland).
 */
class ThurgauTest extends ThurgauBaseTestCase
{
    /**
     * @var int year random year number used for all tests in this Test Case
     */
    protected $year;

    /**
     * Tests if all national holidays in Thurgau are defined by the provider class
     */
    public function testNationalHolidays()
    {
        $nationalHolidays = [];
        if ($this->year >= 1994) {
            $nationalHolidays[] = 'swissNationalDay';
        }
        $this->assertDefinedHolidays($nationalHolidays, self::REGION, $this->year, Holiday::TYPE_NATIONAL);
    }

    /**
     * Tests if all national holidays in Thurgau are defined by the provider class
     */
    public function testRegionalHolidays()
    {
        $this->assertDefinedHolidays([
            'goodFriday',
            'internationalWorkersDay',
            'stStephensDay',
            'newYearsDay',
            'christmasDay',
            'ascensionDay',
            'easterMonday',
            'pentecostMonday',
            'berchtoldsTag'
        ], self::REGION, $this->year, Holiday::TYPE_OTHER);
    }

    /**
     * Tests if all observed holidays in Thurgau (Switzerland) are defined by the provider class
     */
    public function testObservedHolidays()
    {
        $observedHolidays = [];
        if (($this->year >= 1899 && $this->year < 1994) || $this->year = 1891) {
            $observedHolidays[] = 'swissNationalDay';
        }

        $this->assertDefinedHolidays($observedHolidays, self::REGION, $this->year, Holiday::TYPE_OBSERVANCE);
    }

    /**
     * Tests if all seasonal holidays in Thurgau (Switzerland) are defined by the provider class
     */
    public function testSeasonalHolidays()
    {
        $this->assertDefinedHolidays([], self::REGION, $this->year, Holiday::TYPE_SEASON);
    }

    /**
     * Tests if all bank holidays in Thurgau (Switzerland) are defined by the provider class
     */
    public function testBankHolidays()
    {
        $this->assertDefinedHolidays([], self::REGION, $this->year, Holiday::TYPE_BANK);
    }

    /**
     * Tests if all other holidays in Thurgau (Switzerland) are defined by the provider class
     */
    public function testOtherHolidays()
    {
        $this->assertDefinedHolidays([], self::REGION, $this->year, Holiday::TYPE_OTHER);
    }

    /**
     * Initial setup of this Test Case
     */
    protected function setUp()
    {
        $this->year = $this->generateRandomYear(1945);
    }
}
