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

namespace PGunsolley\Legiscan\Http;

/**
 * Provides validation methods to ensure that the API response data 
 * is structured as expected.
 */
class ResponseDataValidation
{
    /**
     * Prevent initialization
     */
    private function __construct()
    {
    }

    /**
     * @param string[] $keys
     * @param array $target
     * @return bool
     */
    private static function areValidIntKeys(array $keys, array $target): bool
    {
        foreach ($keys as $key) {
            if (!self::isValidIntKey($key, $target)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param string[] $keys
     * @param array $target
     * @return bool
     */
    private static function areValidStrKeys(array $keys, array $target): bool
    {
        foreach ($keys as $key) {
            if (!self::isValidStrKey($key, $target)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param string $key
     * @param array $target
     * @return bool
     */
    private static function isValidIntKey(string $key, array $target): bool
    {
        return array_key_exists($key, $target) && is_int($target[$key]);
    }

    /**
     * @param string $key
     * @param array $target
     * @return bool
     */
    private static function isValidStrKey(string $key, array $target): bool
    {
        return array_key_exists($key, $target) && is_string($target[$key]);
    }

    /**
     * Validates the structure and values of the 'getSessionList' response data.
     * 
     * @param array $data
     * @return bool
     */
    public static function isValidSessionListData(array $data): bool
    {
        if (!array_key_exists('sessions', $data)) {
            return false;
        }

        foreach ($data['sessions'] as $session) {
            foreach ([
                'session_id',
                'state_id',
                'year_start',
                'year_end',
                'prefile',
                'sine_die',
                'prior',
                'special',
            ] as $intKey) {
                if (!self::isValidIntKey($intKey, $session)) {
                    return false;
                }
            }

            foreach ([
                'state_abbr',
                'session_tag',
                'session_title',
                'session_name',
                'dataset_hash',
                'session_hash',
                'name',
            ] as $strKey) {
                if (!self::isValidStrKey($strKey, $session)) {
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Validates the structure and values of the 'getMasterList' response data.
     * 
     * @param array $data
     * @return bool
     */
    public static function isValidMasterListData(array $data): bool
    {
        if (!array_key_exists('masterlist', $data)) {
            return false;
        }
        
        foreach ($data['masterlist'] as $key => $master) {
            if (!is_numeric($key)) {
                continue;
            }

            foreach ([
                'bill_id',
                'status',
            ] as $intKey) {
                if (!self::isValidIntKey($intKey, $master)) {
                    return false;
                }
            }

            foreach ([
                'number',
                'change_hash',
                'url',
                'status_date',
                'last_action_date',
                'last_action',
                'title',
                'description',
            ] as $strKey) {
                if (!self::isValidStrKey($strKey, $master)) {
                        return false;
                    }
                }
        }

        return true;
    }

    /**
     * Validates the structure and values of the 'getBill' response data.
     * 
     * @param array $data
     * @return bool
     */
    public static function isValidBillData(array $data): bool
    {
        if (!array_key_exists('bill', $data)) {
            return false;
        }

        $bill = $data['bill'];

        foreach ([
            'bill_id',
            'session_id',
            'completed',
            'status',
            'state_id',
            'body_id',
            'current_body_id',
            'pending_committee_id',
        ] as $intKey) {
            if (!self::isValidIntKey($intKey, $bill)) {
                return false;
            }
        }

        foreach ([
            'change_hash',
            'url',
            'state_link',
            'status_date',
            'state',
            'bill_number',
            'bill_type',
            'bill_type_id',
            'body',
            'current_body',
            'title',
            'description',
        ] as $strKey) {
            if (!self::isValidStrKey($strKey, $bill)) {
                return false;
            }
        }

        if (!array_key_exists('session', $bill)) {
            return false;
        }

        $session = $bill['session'];

        foreach ([
            'session_id',
            'state_id',
            'year_start',
            'year_end',
            'prefile',
            'sine_die',
            'prior',
            'special'
        ] as $intKey) {
            if (!self::isValidIntKey($intKey, $session)) {
                return false;
            }
        }

        foreach ([
            'session_tag',
            'session_title',
            'session_name',
        ] as $strKey) {
            if (!self::isValidStrKey($strKey, $session)) {
                return false;
            }
        }

        if (!array_key_exists('progress', $bill)) {
            return false;
        }

        $progresses = $bill['progress'];

        foreach ($progresses as $progress) {
            foreach ([
                'event',
            ] as $intKey) {
                if (!self::isValidIntKey($intKey, $progress)) {
                    return false;
                }
            }

            foreach ([
                'date',
            ] as $strKey) {
                if (!self::isValidStrKey($strKey, $progress)) {
                    return false;
                }
            }
        }

        if (!array_key_exists('committee', $bill)) {
            return false;
        }

        $committee = $bill['committee'];

        foreach ([
            'committee_id',
            'chamber_id',
        ] as $intKey) {
            if (!self::isValidIntKey($intKey, $committee)) {
                return false;
            }
        }

        foreach ([
            'chamber',
            'name',
        ] as $strKey) {
            if (!self::isValidStrKey($strKey, $committee)) {
                return false;
            }
        }

        if (!array_key_exists('referrals', $bill)) {
            return false;
        }

        $referrals = $bill['referrals'];

        foreach ($referrals as $referral) {
            foreach ([
                'committee_id',
                'chamber_id',
            ] as $intKey) {
                if (!self::isValidIntKey($intKey, $referral)) {
                    return false;
                }
            }

            foreach ([
                'date',
                'chamber',
                'name',
            ] as $strKey) {
                if (!self::isValidStrKey($strKey, $referral)) {
                    return false;
                }
            }
        }

        if (!array_key_exists('history', $bill)) {
            return false;
        }

        $histories = $bill['history'];

        foreach ($histories as $history) {
            foreach ([
                'chamber_id',
                'importance',
            ] as $intKey) {
                if (!self::isValidIntKey($intKey, $history)) {
                    return false;
                }
            }

            foreach ([
                'date',
                'action',
                'chamber',
            ] as $strKey) {
                if (!self::isValidStrKey($strKey, $history)) {
                    return false;
                }
            }
        }

        if (!array_key_exists('sponsors', $bill)) {
            return false;
        }

        $sponsors = $bill['sponsors'];

        foreach ($sponsors as $sponsor) {
            foreach ([
                'people_id',
                'state_id',
                'role_id',
                'ftm_eid',
                'votesmart_id',
                'knowwho_pid',
                'sponsor_type_id',
                'sponsor_order',
                'committee_sponsor',
                'committee_id',
                'state_federal',
            ] as $intKey) {
                if (!self::isValidIntKey($intKey, $sponsor)) {
                    return false;
                }
            }

            foreach ([
                'person_hash',
                'party_id',
                'party',
                'role',
                'name',
                'first_name',
                'middle_name',
                'last_name',
                'suffix',
                'nickname',
                'district',
                'opensecrets_id',
                'ballotpedia',
                'bioguide_id',
            ] as $strKey) {
                if (!self::isValidStrKey($strKey, $sponsor)) {
                    return false;
                }
            }

            if (!array_key_exists('bio', $sponsor)) {
                return false;
            }

            $bio = $sponsor['bio'];

            if (!array_key_exists('social', $bio)) {
                return false;
            }

            $social = $bio['social'];

            foreach ([
                'capitol_phone',
                'district_phone',
                'email',
                'webmail',
                'biography',
                'image',
                'ballotpedia',
                'votesmart',
            ] as $strKey) {
                if (!self::isValidStrKey($strKey, $social)) {
                    return false;
                }
            }

            if (!array_key_exists('capitol_address', $bio)) {
                return false;
            }

            $capitolAddress = $bio['capitol_address'];

            foreach ([
                'address1',
                'address2',
                'city',
                'state',
                'zip',
            ] as $strKey) {
                if (!self::isValidStrKey($strKey, $capitolAddress)) {
                    return false;
                }
            }

            if (!array_key_exists('links', $bio)) {
                return false;
            }

            $links = $bio['links'];

            foreach (['official', 'personal'] as $linkTypeKey) {
                foreach ([
                    'bluesky',
                    'facebook',
                    'instagram',
                    'linkedin',
                    'tiktok',
                    'twitter',
                    'website',
                    'youtube',
                ] as $strKey) {
                    if (!self::isValidStrKey($strKey, $links[$linkTypeKey])) {
                        return false;
                    }
                }
            }
        }

        if (!array_key_exists('sasts', $bill)) {
            return false;
        }

        $sasts = $bill['sasts'];

        foreach ($sasts as $sast) {
            foreach ([
                'type_id',
                'sast_bill_id',
            ] as $intKey) {
                if (!self::isValidIntKey($intKey, $sast)) {
                    return false;
                }
            }

            foreach ([
                'type',
                'sast_bill_number',
            ] as $strKey) {
                if (!self::isValidStrKey($strKey, $sast)) {
                    return false;
                }
            }
        }

        if (!array_key_exists('subjects', $bill)) {
            return false;
        }

        $subjects = $bill['subjects'];

        foreach ($subjects as $subject) {
            if (!self::isValidIntKey('subject_id', $subject) || !self::isValidStrKey('subject_name', $subject)) {
                return false;
            }
        }

        if (!array_key_exists('texts', $bill)) {
            return false;
        }

        $texts = $bill['texts'];

        foreach ($texts as $text) {
            foreach ([
                'doc_id',
                'type_id',
                'mime_id',
                'text_size',
                'alt_bill_text',
                'alt_mime_id',
                'alt_text_size',
            ] as $intKey) {
                if (!self::isValidIntKey($intKey, $text)) {
                    return false;
                }
            }

            foreach ([
                'date',
                'type',
                'mime',
                'url',
                'state_link',
                'text_hash',
                'alt_mime',
                'alt_state_link',
                'alt_text_hash',
            ] as $strKey) {
                if (!self::isValidStrKey($strKey, $text)) {
                    return false;
                }
            }
        }

        if (!array_key_exists('votes', $bill)) {
            return false;
        }

        $votes = $bill['votes'];

        foreach ($votes as $vote) {
            foreach ([
                'roll_call_id',
                'yea',
                'nay',
                'nv',
                'absent',
                'total',
                'passed',
                'chamber_id',
            ] as $intKey) {
                if (!self::isValidIntKey($intKey, $vote)) {
                    return false;
                }
            }

            foreach ([
                'date',
                'desc',
                'chamber',
                'url',
                'state_link',
            ] as $strKey) {
                if (!self::isValidStrKey($strKey, $vote)) {
                    return false;
                }
            }
        }

        if (!array_key_exists('amendments', $bill)) {
            return false;
        }

        $amendments = $bill['amendments'];

        foreach ($amendments as $amendment) {
            foreach ([
                'amendment_id',
                'adopted',
                'chamber_id',
                'mime_id',
                'amendment_size',
                'alt_amendment',
                'alt_mime_id',
                'alt_amendment_size'
            ] as $intKey) {
                if (!self::isValidIntKey($intKey, $amendment)) {
                    return false;
                }
            }

            foreach ([
                'chamber',
                'date',
                'title',
                'description',
                'mime',
                'url',
                'state_link',
                'amendment_hash',
                'alt_mime',
                'alt_state_link',
                'alt_amendment_hash',
            ] as $strKey) {
                if (!self::isValidStrKey($strKey, $amendment)) {
                    return false;
                }
            }
        }

        if (!array_key_exists('supplements', $bill)) {
            return false;
        }

        $supplements = $bill['supplements'];

        foreach ($supplements as $supplement) {
            foreach ([
                'supplement_id',
                'type_id',
                'mime_id',
                'supplement_size',
                'alt_supplement',
                'alt_mime_id',
                'alt_supplement_size',
            ] as $intKey) {
                if (!self::isValidIntKey($intKey, $supplement)) {
                    return false;
                }
            }

            foreach ([
                'date',
                'type',
                'title',
                'description',
                'mime',
                'url',
                'state_link',
                'supplement_hash',
                'alt_mime',
                'alt_state_link',
                'alt_supplement_hash',
            ] as $strKey) {
                if (!self::isValidStrKey($strKey, $supplement)) {
                    return false;
                }
            }
        }

        if (!array_key_exists('calendar', $bill)) {
            return false;
        }

        $calendar = $bill['calendar'];

        foreach ($calendar as $calendarEvent) {
            foreach ([
                'type_id',
            ] as $intKey) {
                if (!self::isValidIntKey($intKey, $calendarEvent)) {
                    return false;
                }
            }

            foreach ([
                'event_hash',
                'type',
                'date',
                'time',
                'location',
                'description',
            ] as $strKey) {
                if (!self::isValidStrKey($strKey, $calendarEvent)) {
                    return false;
                }
            }
        }

        return true;
    }
}
