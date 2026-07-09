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

use Override;

class BillResponseSupplementList extends ResponseList
{
    #[Override]
    protected function createItem(array $item): object
    {
        return new BillResponseSupplement(
            supplementId: $item['supplement_id'],
            date: $item['date'],
            type: $item['type'],
            typeId: $item['type_id'],
            title: $item['title'],
            description: $item['description'],
            mime: $item['mime'],
            mimeId: $item['mime_id'],
            url: $item['url'],
            stateLink: $item['state_link'],
            supplementSize: $item['supplement_size'],
            supplementHash: $item['supplement_hash'],
            altSupplement: $item['alt_supplement'],
            altMime: $item['alt_mime'],
            altMimeId: $item['alt_mime_id'],
            altStateLink: $item['alt_state_link'],
            altSupplementSize: $item['alt_supplement_size'],
            altSupplementHash: $item['alt_supplement_hash'],
        );
    }
}
