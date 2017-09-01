<?php

namespace Ridvanbaluyos\Pwned;

use \Ridvanbaluyos\Pwned\Pwned as Pwned;
/**
 * Getting all breached sites in the system
 * https://haveibeenpwned.com/API/v2#AllBreaches
 *
 * @package    Pwned
 * @author     Ridvan Baluyos <ridvan@baluyos.net>
 * @link       https://github.com/ridvanbaluyos/haveibeenpwned
 * @license    MIT
 */
class Breaches extends Pwned
{
    private $domain;

    /**
     * Breaches constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * This function gets all breaches.
     * @return array
     */
    public function get(): array
    {
        $filters = [];
        $url = $this->endpoint . 'breaches/';

        // Filter domain, if available.
        if (isset($this->domain)) {
            $filters['domain'] = $this->domain;
        }

        $url = $this->setFilters($url, $filters);
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