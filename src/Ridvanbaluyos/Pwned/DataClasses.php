<?php

namespace Ridvanbaluyos\Pwned;

use \Ridvanbaluyos\Pwned\Pwned as Pwned;
/**
 * Getting all data classes in the system
 * https://haveibeenpwned.com/API/v2#AllDataClasses
 *
 * @package    Pwned
 * @author     Ridvan Baluyos <ridvan@baluyos.net>
 * @link       https://github.com/ridvanbaluyos/haveibeenpwned
 * @license    MIT
 */
class DataClasses extends Pwned
{
    /**
     * DataClasses constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * This function gets all data classes.
     *
     * @return array
     */
    public function get(): array
    {
        $url = $this->endpoint . 'dataclasses';
        $dataClasses = $this->requestGet($url);

        return $dataClasses;
    }
}