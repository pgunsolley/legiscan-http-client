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

class BillResponseTextList implements IteratorAggregate
{
    public function __construct(private array $data)
    {
    }

    #[Override]
    public function getIterator(): Traversable
    {
        foreach ($this->data as $item) {
            yield new BillResponseText(
                docId: $item['doc_id'],
                date: $item['date'],
                type: $item['type'],
                typeId: $item['type_id'],
                mime: $item['mime'],
                mimeId: $item['mime_id'],
                url: $item['url'],
                stateLink: $item['state_link'],
                textSize: $item['text_size'],
                textHash: $item['text_hash'],
                altBillText: $item['alt_bill_text'],
                altMime: $item['alt_mime'],
                altMimeId: $item['alt_mime_id'],
                altStateLink: $item['alt_state_link'],
                altTextSize: $item['alt_text_size'],
                altTextHash: $item['alt_text_hash'],
            );
        }
    }
}
