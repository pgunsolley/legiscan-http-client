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

        $sessions = $data['sessions'];

        foreach ($sessions as $session) {
            if (!self::areValidIntKeys([
                'session_id',
                'state_id',
                'year_start',
                'year_end',
                'prefile',
                'sine_die',
                'prior',
                'special',
            ], $session)) {
                return false;
            }

            if (!self::areValidStrKeys([
                'state_abbr',
                'session_tag',
                'session_title',
                'session_name',
                'dataset_hash',
                'session_hash',
                'name',
            ], $session)) {
                return false;
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

        $masterlist = $data['masterlist'];
        
        foreach ($masterlist as $key => $master) {
            if (!is_numeric($key)) {
                continue;
            }

            if (!self::areValidIntKeys([
                'bill_id',
                'status',
            ], $master)) {
                return false;
            }

            if (!self::areValidStrKeys([
                'number',
                'change_hash',
                'url',
                'status_date',
                'last_action_date',
                'last_action',
                'title',
                'description',
            ], $master)) {
                return false;
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

        if (!self::areValidIntKeys([
            'bill_id',
            'session_id',
            'completed',
            'status',
            'state_id',
            'body_id',
            'current_body_id',
            'pending_committee_id',
        ], $bill)) {
            return false;
        }

        if (!self::areValidStrKeys([
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
        ], $bill)) {
            return false;
        }

        if (!array_key_exists('session', $bill)) {
            return false;
        }

        $session = $bill['session'];

        if (!self::areValidIntKeys([
            'session_id',
            'state_id',
            'year_start',
            'year_end',
            'prefile',
            'sine_die',
            'prior',
            'special'
        ], $session)) {
            return false;
        }

        if (!self::areValidStrKeys([
            'session_tag',
            'session_title',
            'session_name',
        ], $session)) {
            return false;
        }

        if (!array_key_exists('progress', $bill)) {
            return false;
        }

        $progresses = $bill['progress'];

        foreach ($progresses as $progress) {
            if (!self::isValidIntKey('event', $progress)) {
                return false;
            }

            if (!self::isValidStrKey('date', $progress)) {
                return false;
            }
        }

        if (!array_key_exists('committee', $bill)) {
            return false;
        }

        $committee = $bill['committee'];

        if (!self::areValidIntKeys([
            'committee_id',
            'chamber_id',
        ], $committee)) {
            return false;
        }

        if (!self::areValidStrKeys([
            'chamber',
            'name',
        ], $committee)) {
            return false;
        }

        if (!array_key_exists('referrals', $bill)) {
            return false;
        }

        $referrals = $bill['referrals'];

        foreach ($referrals as $referral) {
            if (!self::areValidIntKeys([
                'committee_id',
                'chamber_id',
            ], $referral)) {
                return false;
            }

            if (!self::areValidStrKeys([
                'date',
                'chamber',
                'name',
            ], $referral)) {
                return false;
            }
        }

        if (!array_key_exists('history', $bill)) {
            return false;
        }

        $histories = $bill['history'];

        foreach ($histories as $history) {
            if (!self::areValidIntKeys([
                'chamber_id',
                'importance',
            ], $history)) {
                return false;
            }

            if (!self::areValidStrKeys([
                'date',
                'action',
                'chamber',
            ], $history)) {
                return false;
            }
        }

        if (!array_key_exists('sponsors', $bill)) {
            return false;
        }

        $sponsors = $bill['sponsors'];

        foreach ($sponsors as $sponsor) {
            if (!self::areValidIntKeys([
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
            ], $sponsor)) {
                return false;
            }

            if (!self::areValidStrKeys([
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
            ], $sponsor)) {
                return false;
            }

            if (!array_key_exists('bio', $sponsor)) {
                return false;
            }

            $bio = $sponsor['bio'];

            if (!array_key_exists('social', $bio)) {
                return false;
            }

            $social = $bio['social'];

            if (!self::areValidStrKeys([
                'capitol_phone',
                'district_phone',
                'email',
                'webmail',
                'biography',
                'image',
                'ballotpedia',
                'votesmart',
            ], $social)) {
                return false;
            }

            if (!array_key_exists('capitol_address', $bio)) {
                return false;
            }

            $capitolAddress = $bio['capitol_address'];

            if (!self::areValidStrKeys([
                'address1',
                'address2',
                'city',
                'state',
                'zip',
            ], $capitolAddress)) {
                return false;
            }

            if (!array_key_exists('links', $bio)) {
                return false;
            }

            $links = $bio['links'];

            foreach (['official', 'personal'] as $linkTypeKey) {
                if (!self::areValidStrKeys([
                    'bluesky',
                    'facebook',
                    'instagram',
                    'linkedin',
                    'tiktok',
                    'twitter',
                    'website',
                    'youtube',
                ], $links[$linkTypeKey])) {
                    return false;
                }
            }
        }

        if (!array_key_exists('sasts', $bill)) {
            return false;
        }

        $sasts = $bill['sasts'];

        foreach ($sasts as $sast) {
            if (!self::areValidIntKeys([
                'type_id',
                'sast_bill_id',
            ], $sast)) {
                return false;
            }

            if (!self::areValidStrKeys([
                'type',
                'sast_bill_number',
            ], $sast)) {
                return false;
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
            if (!self::areValidIntKeys([
                'doc_id',
                'type_id',
                'mime_id',
                'text_size',
                'alt_bill_text',
                'alt_mime_id',
                'alt_text_size',
            ], $text)) {
                return false;
            }

            if (!self::areValidStrKeys([
                'date',
                'type',
                'mime',
                'url',
                'state_link',
                'text_hash',
                'alt_mime',
                'alt_state_link',
                'alt_text_hash',
            ], $text)) {
                return false;
            }
        }

        if (!array_key_exists('votes', $bill)) {
            return false;
        }

        $votes = $bill['votes'];

        foreach ($votes as $vote) {
            if (!self::areValidIntKeys([
                'roll_call_id',
                'yea',
                'nay',
                'nv',
                'absent',
                'total',
                'passed',
                'chamber_id',
            ], $vote)) {
                return false;
            }

            if (!self::areValidStrKeys([
                'date',
                'desc',
                'chamber',
                'url',
                'state_link',
            ], $vote));
        }

        if (!array_key_exists('amendments', $bill)) {
            return false;
        }

        $amendments = $bill['amendments'];

        foreach ($amendments as $amendment) {
            if (!self::areValidIntKeys([
                'amendment_id',
                'adopted',
                'chamber_id',
                'mime_id',
                'amendment_size',
                'alt_amendment',
                'alt_mime_id',
                'alt_amendment_size',
            ], $amendment)) {
                return false;
            }

            if (!self::areValidStrKeys([
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
            ], $amendment)) {
                return false;
            }
        }

        if (!array_key_exists('supplements', $bill)) {
            return false;
        }

        $supplements = $bill['supplements'];

        foreach ($supplements as $supplement) {
            if (!self::areValidIntKeys([
                'supplement_id',
                'type_id',
                'mime_id',
                'supplement_size',
                'alt_supplement',
                'alt_mime_id',
                'alt_supplement_size',
            ], $supplement)) {
                return false;
            }

            if (!self::areValidStrKeys([
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
            ], $supplement)) {
                return false;
            }
        }

        if (!array_key_exists('calendar', $bill)) {
            return false;
        }

        $calendar = $bill['calendar'];

        foreach ($calendar as $calendarEvent) {
            if (!self::isValidIntKey('type_id', $calendarEvent)) {
                return false;
            }

            if (!self::areValidStrKeys([
                'event_hash',
                'type',
                'date',
                'time',
                'location',
                'description',
            ], $calendarEvent)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Validates the structure and values of the 'getBillText' response data.
     * 
     * @param array $data
     * @return bool
     */
    public static function isValidBillTextData(array $data): bool
    {
        if (!array_key_exists('text', $data)) {
            return false;
        }

        $text = $data['text'];

        if (!self::areValidIntKeys([
            'doc_id',
            'bill_id',
            'type_id',
            'mime_id',
            'text_size',
            'alt_bill_text',
            'alt_mime_id',
            'alt_text_size',
        ], $text)) {
            return false;
        }

        if (!self::areValidStrKeys([
            'date',
            'type',
            'mime',
            'url',
            'state_link',
            'text_hash',
            'doc',
            'alt_mime',
            'alt_state_link',
            'alt_text_hash',
        ], $text)) {
            return false;
        }

        return true;
    }

    /**
     * Validates the structure and values of the 'getAmendment' response data.
     * 
     * @param array $data
     * @return bool
     */
    public static function isValidAmendmentData(array $data): bool
    {
        if (!array_key_exists('amendment', $data)) {
            return false;
        }

        $amendment = $data['amendment'];

        if (!self::areValidIntKeys([
            'amendment_id',
            'bill_id',
            'adopted',
            'chamber_id',
            'mime_id',
            'amendment_size',
            'alt_amendment',
            'alt_mime_id',
            'alt_amendment_size',
        ], $amendment)) {
            return false;
        }

        if (!self::areValidStrKeys([
            'chamber',
            'date',
            'title',
            'description',
            'mime',
            'url',
            'state_link',
            'amendment_hash',
            'doc',
            'alt_mime',
            'alt_state_link',
            'alt_amendment_hash',
            'alt_doc',
        ], $amendment)) {
            return false;
        }

        return true;
    }

    /**
     * Validates the structure and values of the 'getSupplement' response data.
     * 
     * @param array $data
     * @return bool
     */
    public static function isValidSupplementData(array $data): bool
    {
        if (!array_key_exists('supplement', $data)) {
            return false;
        }

        $supplement = $data['supplement'];

        if (!self::areValidIntKeys([
            'supplement_id',
            'bill_id',
            'type_id',
            'mime_id',
            'supplement_size',
            'alt_supplement',
            'alt_mime_id',
            'alt_supplement_size',
        ], $supplement)) {
            return false;
        }

        if (!self::areValidStrKeys([
            'date',
            'type',
            'title',
            'description',
            'mime',
            'url',
            'state_link',
            'supplement_hash',
            'doc',
            'alt_mime',
            'alt_state_link',
            'alt_supplement_hash',
            'alt_doc',
        ], $supplement)) {
            return false;
        }

        return true;
    }
}
