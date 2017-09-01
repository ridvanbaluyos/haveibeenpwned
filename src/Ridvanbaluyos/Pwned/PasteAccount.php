<?php

namespace Ridvanbaluyos\Pwned;

use \Ridvanbaluyos\Pwned\Pwned as Pwned;
/**
 * Getting all data classes in the system
 * https://haveibeenpwned.com/API/v2#PastesForAccount
 *
 * @package    Pwned
 * @author     Ridvan Baluyos <ridvan@baluyos.net>
 * @link       https://github.com/ridvanbaluyos/haveibeenpwned
 * @license    MIT
 */
class PasteAccount extends Pwned
{
    private $account;

    /**
     * PasteAccount constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * This function gets all pastes for an account
     *
     * @return array
     */
    public function get(): array
    {
        // No account has been set, return empty array.
        if (!isset($this->account)) return [];

        $url = $this->endpoint . 'pasteaccount/' . $this->account;
        $pasteAccounts = $this->requestGet($url);

        return $pasteAccounts;
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
}