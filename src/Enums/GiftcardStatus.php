<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class GiftcardStatus
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class GiftcardStatus extends Enum
{
    /**
     *
     */
    CONST STATUS_INACTIVE = 0;

    /**
     *
     */
    CONST STATUS_ACTIVE = 1;
}
