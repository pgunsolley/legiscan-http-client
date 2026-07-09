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

namespace PGunsolley\Legiscan\Http\Response;

use IteratorAggregate;
use Traversable;
use Override;

class SessionListResponse implements IteratorAggregate
{
    /**
     * @param array $data The session list data array
     */
    public function __construct(private array $data)
    {
    }

    #[Override]
    public function getIterator(): Traversable
    {
        foreach ($this->data as $item) {
            yield new SessionListResponseItem(
                sessionId: $item['session_id'],
                stateId: $item['state_id'],
                stateAbbr: $item['state_abbr'],
                yearStart: $item['year_start'],
                yearEnd: $item['year_end'],
                prefile: $item['prefile'],
                sineDie: $item['sine_die'],
                prior: $item['prior'],
                special: $item['special'],
                sessionTag: $item['session_tag'],
                sessionTitle: $item['session_title'],
                sessionName: $item['session_name'],
                datasetHash: $item['dataset_hash'],
                sessionHash: $item['session_hash'],
                name: $item['name'],
            );
        }
    }
}
