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

class BillResponseSponsorBioLink
{
    public function __construct(
        public readonly string $bluesky,
        public readonly string $facebook,
        public readonly string $instagram,
        public readonly string $linkedin,
        public readonly string $tiktok,
        public readonly string $twitter,
        public readonly string $website,
        public readonly string $youtube,
    ) {
    }
}
