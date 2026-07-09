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

class PersonResponse
{
    public function __construct(
        public readonly int $peopleId,
        public readonly string $personHash,
        public readonly string $partyId,
        public readonly int $stateId,
        public readonly string $party,
        public readonly int $roleId,
        public readonly string $role,
        public readonly string $name,
        public readonly string $firstName,
        public readonly string $middleName,
        public readonly string $lastName,
        public readonly string $suffix,
        public readonly string $nickname,
        public readonly string $district,
        public readonly int $ftmEid,
        public readonly int $votesmartId,
        public readonly string $opensecretsId,
        public readonly int $knowwhoPid,
        public readonly string $ballotpedia,
        public readonly string $bioguideId,
        public readonly int $committeeSponsor,
        public readonly int $committeeId,
        public readonly int $stateFederal,
        public readonly BillResponseSponsorBio $bio,
    ) {
    }
}
