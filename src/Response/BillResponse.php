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

class BillResponse
{
    public function __construct(
        public readonly int $billId,
        public readonly string $changeHash,
        public readonly int $sessionId,
        public readonly BillResponseSession $session,
        public readonly string $url,
        public readonly string $stateLink,
        public readonly int $completed,
        public readonly int $status,
        public readonly string $statusDate,
        public readonly iterable $progress,
        public readonly string $state,
        public readonly int $stateId,
        public readonly string $billNumber,
        public readonly string $billType,
        public readonly string $billTypeId,
        public readonly string $body,
        public readonly int $bodyId,
        public readonly string $currentBody,
        public readonly int $currentBodyId,
        public readonly string $title,
        public readonly string $description,
        public readonly int $pendingCommitteeId,
        public readonly BillResponseCommittee $committee,
        public readonly iterable $referrals,
        public readonly iterable $history,
        public readonly iterable $sponsors,
        public readonly iterable $sasts,
        public readonly iterable $subjects,
        public readonly iterable $texts,
        public readonly iterable $votes,
        public readonly iterable $amendments,
        public readonly iterable $supplements,
        public readonly iterable $calendar,
    ) {
    }
}
