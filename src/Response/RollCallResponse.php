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

namespace PGunsolley\Legiscan\Http\Response;

class RollCallResponse
{
    public function __construct(
        public readonly int $rollCallId,
        public readonly int $billId,
        public readonly string $date,
        public readonly string $desc,
        public readonly int $yea,
        public readonly int $nay,
        public readonly int $nv,
        public readonly int $absent,
        public readonly int $total,
        public readonly int $passed,
        public readonly string $chamber,
        public readonly int $chamberId,
        public readonly iterable $votes,
    ) {
    }
}
