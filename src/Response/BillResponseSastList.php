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

class BillResponseSastList extends ResponseList
{
    #[Override]
    protected function createItem(array $item): object
    {
        return new BillResponseSast(
            typeId: $item['type_id'],
            type: $item['type'],
            sastBillNumber: $item['sast_bill_number'],
            sastBillId: $item['sast_bill_id'],
        );
    }
}
