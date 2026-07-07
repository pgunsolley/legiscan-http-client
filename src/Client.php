<?php
/**
 * LegiScan (https://legiscan.com) Http Client
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see LICENSE
 * Redistributions of files must retain the above copyright notice.
 *
 * @author        Patrick Gunsolley <patrick.gunsolley@outlook.com>
 * @copyright     Copyright (c) 2026 Patrick Gunsolley
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

declare(strict_types=1);

namespace PGunsolley\Legiscan\Http;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Response;
use PGunsolley\Legiscan\Http\Dto\SessionListRecordDto;

/**
 * Client
 * 
 * The REST API Http client for https://legiscan.com
 */
class Client
{
    /**
     * @var \GuzzleHttp\Client $client
     */
    private GuzzleClient $client;

    /**
     * Initializes Client
     * 
     * You may inject a GuzzleHttp client as the 2nd argument, otherwise a default
     * instance will be used. In most cases, the default is sufficient.
     * 
     * @param string                        $key    Legiscan API auth key
     * @param \GuzzleHttp\Client|array|null $guzzle Guzzle HTTP client or configuration
     */
    public function __construct(private string $key, GuzzleClient|array|null $guzzle = null)
    {
        $this->client = $guzzle instanceof GuzzleClient ? $guzzle : new GuzzleClient($guzzle ?? [
            'base_uri' => 'https://api.legiscan.com',
        ]);
    }

    /**
     * 
     */
    private function handleGetRequest(): Response
    {

    }

    /**
     * GET a session list response
     * 
     * @param string $state The target US state abbreviation
     * @return \PGunsolley\LegiScan\Http\Dto\SessionListRecordDto
     */
    public function getSessionList(string $state): SessionListRecordDto
    {

    }

    /**
     * GET a master list response
     * 
     * @param int $id The session id to query against
     * @return array
     */
    public function getMasterList(int $id)
    {

    }

    /**
     * GET a bill response
     * 
     * @param int $id The bill id
     * @return array
     */
    public function getBill(int $id)
    {

    }

    /**
     * GET bill text response
     * 
     * @param int $id The bill text id
     * @return array
     */
    public function getBillText(int $id)
    {

    }

    /**
     * GET amendment text response
     * 
     * @param int $id The amendment id
     * @return array
     */
    public function getAmendment(int $id)
    {

    }

    /**
     * GET supplement text response
     * 
     * @param int $id The supplement id
     * @return array
     */
    public function getSupplement(int $id)
    {

    }

    /**
     * GET person text response
     * 
     * @param int $id The person's id
     * @return array
     */
    public function getPerson(int $id)
    {

    }
}
