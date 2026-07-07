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

namespace PGunsolley\LegiScan\Http\Dto;

class BillSponsorBioSocialDto
{
    public function __construct(
        public readonly string $capitolPhone,
        public readonly string $districtPhone,
        public readonly string $email,
        public readonly string $webmail,
        public readonly string $biography,
        public readonly string $image,
        public readonly string $ballotpedia,
        public readonly string $votesmart,
    ) {
    }
}
