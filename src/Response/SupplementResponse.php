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

class SupplementResponse
{
    public function __construct(
        public readonly int $supplementId,
        public readonly int $billId,
        public readonly string $date,
        public readonly int $typeId,
        public readonly string $type,
        public readonly string $title,
        public readonly string $description,
        public readonly string $mime,
        public readonly int $mimeId,
        public readonly string $url,
        public readonly string $stateLink,
        public readonly int $supplementSize,
        public readonly string $supplementHash,
        public readonly string $doc,
        public readonly int $altSupplement,
        public readonly string $altMime,
        public readonly int $altMimeId,
        public readonly string $altStateLink,
        public readonly int $altSupplementSize,
        public readonly string $altSupplementHash,
        public readonly string $altDoc,
    ) {
    }
}
