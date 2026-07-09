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

namespace PGunsolley\LegiScan\Http\Response;

class MasterListResponseItem
{
    public function __construct(
        public readonly int $billId,
        public readonly string $number,
        public readonly string $changeHash,
        public readonly string $url,
        public readonly string $statusDate,
        public readonly int $status,
        public readonly string $lastActionDate,
        public readonly string $lastAction,
        public readonly string $title,
        public readonly string $description,
    ) {
    }
}
