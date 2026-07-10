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
use PGunsolley\LegiScan\Http\Exception\InvalidResponseStatusException;
use PGunsolley\Legiscan\Http\Response\SessionListResponse;

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
     * @param \GuzzleHttp\Client|array $guzzle Guzzle HTTP client or configuration
     */
    public function __construct(private string $key, GuzzleClient|array $guzzle = [])
    {
        $this->client = $guzzle instanceof GuzzleClient ? $guzzle : new GuzzleClient($guzzle);
    }

    /**
     * @param array $query An array of query params for the request
     * @return array
     */
    public function handleRequest(array $query): array
    {
        $res = $this
            ->client
            ->get(
                uri: 'https://api.legiscan.com',
                options: [
                    'headers' => [
                        'Accept' => 'application/json',
                    ],
                    'query' => ['key' => $this->key] + $query,
                ],
            );

        $statusCode = $res->getStatusCode();
        if ($statusCode !== 200) {
            throw new InvalidResponseStatusException("Status code is $statusCode");
        }

        return json_decode($res->getBody()->getContents(), true);
    }

    /**
     * GET a session list response
     * 
     * @param string $state The target US state abbreviation
     * @return \PGunsolley\LegiScan\Http\Response\SessionListResponse
     */
    public function getSessionList(string $state): SessionListResponse
    {
        $data = $this->handleRequest([
            'op' => 'getSessionList',
            'state' => $state,
        ]);

        if (!ResponseDataValidation::isValidSessionListData($data)) {
            // TODO: Create custom exception that accepts the response data array
        }

        return ResponseFactory::createSessionListResponse($data);
    }

    /**
     * GET a master list response
     * 
     * @param int $id The session id to query against
     * @return array
     */
    public function getMasterList(int $id)
    {
        $data = $this->handleRequest([
            'op' => 'getMasterList',
            'id' => $id,
        ]);

        if (!ResponseDataValidation::isValidMasterListData($data)) {
            // TODO: Throw?
        }

        return ResponseFactory::createMasterListResponse($data);
    }

    /**
     * GET a bill response
     * 
     * @param int $id The bill id
     * @return array
     */
    public function getBill(int $id)
    {
        $data = $this->handleRequest([
            'op' => 'getBill',
            'id' => $id,
        ]);

        
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
