<?php 

namespace Ridvanbaluyos\Pwned;

use \Ridvanbaluyos\Pwned\Pwned as Pwned;
/**
 * Getting all breaches for an account
 * https://haveibeenpwned.com/API/v2#BreachesForAccount
 *
 * @package    Pwned
 * @author     Ridvan Baluyos <ridvan@baluyos.net>
 * @link       https://github.com/ridvanbaluyos/haveibeenpwned
 * @license    MIT
 */
class BreachedAccount extends Pwned
{
    private $account;
    private $domain;
    private $truncateResponse;
    private $includeUnverified;

    /**
     * BreachedAccount constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * This function gets all breaches for an account.
     *
     * @param string $account
     * @return array
     */
    public function get(): array
    {
        // No account has been set, return empty array.
        if (!isset($this->account)) return [];

        $filters = [];
        $url = $this->endpoint . 'breachedaccount/' . $this->account;

        // Return only the name of the breach.
        if (isset($this->truncateResponse)) {
            $filters['truncateResponse'] = $this->truncateResponse;
        }

        // Filter domain, if available.
        if (isset($this->domain)) {
            $filters['domain'] = $this->domain;
        }

        // Include unverified domains?
        if (isset($this->includeUnverified)) {
            $filters['includeUnverified'] = $this->includeUnverified;
        }

        $url = $this->setFilters($url, $filters);
        $breachedAccounts = $this->requestGet($url);

        return $breachedAccounts;
    }

    /**
     * Sets the account.
     *
     * @param string $account
     * @return $this
     */
    public function setAccount(string $account)
    {
        $this->account = $account;
        return $this;
    }

    /**
     * Sets if response should be truncated. Only return the name of the breach.
     *
     * @param bool $isTruncated
     * @return $this
     */
    public function setTruncatedResponse(string $truncateResponse = 'true')
    {
        $this->truncateResponse = $truncateResponse;
        return $this;
    }

    /**
     * Sets if response should include unverified domains.
     *
     * @param bool $includeUnverified
     * @return $this
     */
    public function setIncludeUnverified(string $includeUnverified = 'true')
    {
        $this->includeUnverified = $includeUnverified;
        return $this;
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