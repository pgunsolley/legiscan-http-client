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

class BillResponseProgressList implements IteratorAggregate
{
    public function __construct(private array $data)
    {
    }

    #[Override]
    public function getIterator(): Traversable
    {
        foreach ($this->data as $item) {
            yield new BillResponseProgress(
                date: $item['date'],
                event: $item['event'],
            );
        }
    }
}
