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

class BillTextResponse
{
    public function __construct(
        public readonly int $docId,
        public readonly int $billId,
        public readonly string $date,
        public readonly string $type,
        public readonly int $typeId,
        public readonly string $mime,
        public readonly int $mimeId,
        public readonly string $url,
        public readonly string $stateLink,
        public readonly int $textSize,
        public readonly string $textHash,
        public readonly string $doc,
        public readonly int $altBillText,
        public readonly string $altMime,
        public readonly int $altMimeId,
        public readonly string $altStateLink,
        public readonly int $altTextSize,
        public readonly string $altTextHash,
        public readonly string $altDoc,
    ) {
    }
}
