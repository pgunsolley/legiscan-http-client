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

use Exception;
use PGunsolley\LegiScan\Http\Response\BillResponse;
use PGunsolley\LegiScan\Http\Response\MasterListResponse;
use PGunsolley\Legiscan\Http\Response\SessionListResponse;

/**
 * 
 */
class ResponseFactory
{
    /**
     * Prevent initialization
     */
    private function __construct()
    {
    }

    /**
     * @param array $data
     * @return SessionListResponse
     */
    public static function createSessionListResponse(array $data): SessionListResponse
    {
        return new SessionListResponse($data['sessions']);
    }

    /**
     * @param array $data
     * @return MasterListResponse
     */
    public static function createMasterListResponse(array $data): MasterListResponse
    {
        unset($data['masterlist']['session']);
        return new MasterListResponse(array_values($data['masterlist']));
    }

    /**
     * @param array $data
     * @return BillResponse
     */
    public static function createBillResponse(array $data): BillResponse
    {
        throw new Exception('Not implemented');
    }
}
