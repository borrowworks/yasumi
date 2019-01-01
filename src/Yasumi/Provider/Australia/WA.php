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

namespace Yasumi\Provider\Australia;

use DateTime;
use DateTimeZone;
use Yasumi\Holiday;
use Yasumi\Provider\Australia;

/**
 * Provider for all holidays in Western Australia (Australia).
 *
 */
class WA extends Australia
{
    /**
     * Code to identify this Holiday Provider. Typically this is the ISO3166 code corresponding to the respective
     * country or sub-region.
     */
    const ID = 'AU-WA';

    public $timezone = 'Australia/West';

    /**
     * Initialize holidays for Western Australia (Australia).
     *
     * @throws \InvalidArgumentException
     * @throws \Yasumi\Exception\UnknownLocaleException
     * @throws \Exception
     */
    public function initialize()
    {
        parent::initialize();

        $this->calculateQueensBirthday();
        $this->calculateLabourDay();
        $this->calculateWesternAustraliaDay();
    }

    /**
     * Labour Day
     *
     * @throws \Exception
     */
    public function calculateLabourDay()
    {
        $date = new DateTime("first monday of march $this->year", new DateTimeZone($this->timezone));

        $this->addHoliday(new Holiday('labourDay', [], $date, $this->locale));
    }

    /**
     * Western Australia Day
     *
     * @link https://en.wikipedia.org/wiki/Western_Australia_Day
     *
     * @throws \InvalidArgumentException
     * @throws \Exception
     */
    public function calculateWesternAustraliaDay()
    {
        $this->calculateHoliday(
            'westernAustraliaDay',
            ['en_AU' => 'Western Australia Day'],
            new DateTime('first monday of june ' . $this->year, new DateTimeZone($this->timezone)),
            false,
            false
        );
    }
    
    /**
     * Queens Birthday.
     *
     * The Queen's Birthday is an Australian public holiday but the date varies across
     * states and territories. Australia celebrates this holiday because it is a constitutional
     * monarchy, with the English monarch as head of state.
     *
     * Her actual birthday is on April 21, but it's celebrated as a public holiday on the second Monday of June.
     *  (Except QLD & WA)
     *
     * @link https://www.timeanddate.com/holidays/australia/queens-birthday
     *
     * @throws \InvalidArgumentException
     * @throws \Exception
     */
    public function calculateQueensBirthday()
    {
        if ($this->year === 2011) {
            $this->calculateHoliday(
                'queensBirthday',
                ['en_AU' => "Queen's Birthday"],
                new DateTime('2011-10-28', new DateTimeZone($this->timezone)),
                false,
                false
            );
        } elseif ($this->year === 2012) {
            $this->calculateHoliday(
                'queensBirthday',
                ['en_AU' => "Queen's Birthday"],
                new DateTime('2012-10-01', new DateTimeZone($this->timezone)),
                false,
                false
            );
        } else {
            $this->calculateHoliday(
                'queensBirthday',
                ['en_AU' => "Queen's Birthday"],
                new DateTime('last monday of september ' . $this->year, new DateTimeZone($this->timezone)),
                false,
                false
            );
        }
    }
}
