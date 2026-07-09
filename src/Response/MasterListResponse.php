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

class MasterListResponse extends ResponseList
{
    #[Override]
    protected function createItem(array $item): object
    {
        return new MasterListResponseItem(
            billId: $item['bill_id'],
            number: $item['number'],
            changeHash: $item['changeHash'],
            url: $item['url'],
            statusDate: $item['status_date'],
            status: $item['status'],
            lastActionDate: $item['last_action_date'],
            lastAction: $item['last_action'],
            title: $item['title'],
            description: $item['description'],
        );
    }
}
