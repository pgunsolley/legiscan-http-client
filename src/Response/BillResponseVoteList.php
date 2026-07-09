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

use IteratorAggregate;
use Traversable;
use Override;

class BillResponseVoteList implements IteratorAggregate
{
    public function __construct(private array $data)
    {
    }

    #[Override]
    public function getIterator(): Traversable
    {
        foreach ($this->data as $item) {
            yield new BillResponseVote(
                rollCallId: $item['roll_call_id'],
                date: $item['date'],
                desc: $item['desc'],
                yea: $item['yea'],
                nay: $item['nay'],
                nv: $item['nv'],
                absent: $item['absent'],
                total: $item['total'],
                passed: $item['passed'],
                chamber: $item['chamber'],
                chamberId: $item['chamber_id'],
                url: $item['url'],
                stateLink: $item['state_link'],
            );
        }
    }
}
