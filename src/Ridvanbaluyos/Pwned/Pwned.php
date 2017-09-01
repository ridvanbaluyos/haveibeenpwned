<?php

namespace Ridvanbaluyos\Pwned;

use \GuzzleHttp\Client as Client;
/**
 * Have I Been Pwned? API v2 only.
 * https://haveibeenpwned.com/About
 *
 * @package    Pwned
 * @author     Ridvan Baluyos <ridvan@baluyos.net>
 * @link       https://github.com/ridvanbaluyos/haveibeenpwned
 * @license    MIT
 */
class Pwned
{
    protected $endpoint;
    protected $client;

    /**
     * Pwned constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
        $this->endpoint = 'https://haveibeenpwned.com/api/v2/';
    }

    /**
     * Set the filters.
     *
     * @param array $filters
     * @return string
     */
    protected function setFilters(string $url, array $filters): string
    {
        // Append query filters if available.
        if (!empty($filters)) {
            $query = http_build_query($filters);
            $url .= '?' . $query;
        }

        return $url;
    }

    /**
     * Guzzle GET request.
     *
     * @param string $url
     * @return array
     */
    protected function requestGet(string $url): array
    {
        try {
            $result = $this->client->request('GET', $url);
            $jsonResponse = $this->getJsonResponse($result);

            return $jsonResponse;
        } catch(\GuzzleHttp\Exception\ClientException $e) {
            return [
                'code' => $e->getCode(),
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * This function converts a guzzle response into a JSON response.
     *
     * @param \GuzzleHttp\Psr7\Response $response
     * @return array
     */
    private function getJsonResponse(\GuzzleHttp\Psr7\Response $response): array
    {
        switch ($response->getStatusCode()) {
            case 200:
                $response = (string) $response->getBody();

                if (empty($response) || !isset($response) || $response == '') {
                    $response = '{}';
                }
                break;
            case 404:
                $response = [];
                break;
            default:
                $response = [];
                break;
        }

        return json_decode($response, true);
    }
}