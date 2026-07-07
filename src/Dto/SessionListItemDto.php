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

namespace PGunsolley\Legiscan\Http\Dto;

class SessionListItemDto
{
    public function __construct(
        public readonly int $sessionId,
        public readonly int $stateId,
        public readonly string $stateAbbr,
        public readonly int $yearStart,
        public readonly int $yearEnd,
        public readonly int $prefile,
        public readonly int $sineDie,
        public readonly int $prior,
        public readonly int $special,
        public readonly string $sessionTag,
        public readonly string $sessionTitle,
        public readonly string $sessionName,
        public readonly string $datasetHash,
        public readonly string $sessionhash,
        public readonly string $name,
    ) {
    }
}
