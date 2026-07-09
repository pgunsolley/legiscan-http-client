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

class BillResponseAmendmentList implements IteratorAggregate
{
    public function __construct(private array $data)
    {
    }

    #[Override]
    public function getIterator(): Traversable
    {
        foreach ($this->data as $item) {
            yield new BillResponseAmendment(
                amendmentId: $item['amendment_id'],
                adopted: $item['adopted'],
                chamber: $item['chamber'],
                chamberId: $item['chamber_id'],
                date: $item['date'],
                title: $item['title'],
                description: $item['description'],
                mime: $item['mime'],
                mimeId: $item['mime_id'],
                url: $item['url'],
                stateLink: $item['state_link'],
                amendmentSize: $item['amendment_size'],
                amendmentHash: $item['amendment_hash'],
                altAmendment: $item['alt_amendment'],
                altMime: $item['alt_mime'],
                altMimeId: $item['alt_mime_id'],
                altStateLink: $item['alt_state_link'],
                altAmendmentSize: $item['alt_amendment_size'],
                altAmendmentHash: $item['alt_amendment_hash'],
            );
        }
    }
}
