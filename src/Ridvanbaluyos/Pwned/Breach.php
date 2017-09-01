<?php

namespace Ridvanbaluyos\Pwned;

use \Ridvanbaluyos\Pwned\Pwned as Pwned;
/**
 * Getting a single breached site
 * https://haveibeenpwned.com/API/v2#SingleBreach
 *
 * @package    Pwned
 * @author     Ridvan Baluyos <ridvan@baluyos.net>
 * @link       https://github.com/ridvanbaluyos/haveibeenpwned
 * @license    MIT
 */
class Breach extends Pwned
{
    /**
     * Breaches constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * This function gets a specific breach.
     *
     * @return array
     */
    public function get(): array
    {
        // No domain has been set, return empty array.
        if (!isset($this->domain)) return [];

        $url = $this->endpoint . 'breach/' . $this->domain;
        $breaches = $this->requestGet($url);

        return $breaches;
    }

    /**
     * Sets the domain filter. Filter the results only to the domain specified.
     *
     * @param string $domain
     * @return $this
     */
    public function setDomain(string $domain)
    {
        $this->domain = $domain;
        return $this;
    }
}