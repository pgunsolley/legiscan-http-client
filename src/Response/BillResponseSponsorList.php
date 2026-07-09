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

class BillResponseSponsorList implements IteratorAggregate
{
    public function __construct(private array $data)
    {
    }

    #[Override]
    public function getIterator(): Traversable
    {
        foreach ($this->data as $item) {
            yield new BillResponseSponsor(
                peopleId: $item['people_id'],
                personHash: $item['person_hash'],
                partyId: $item['party_id'],
                stateId: $item['state_id'],
                party: $item['party'],
                roleId: $item['roleId'],
                role: $item['role'],
                name: $item['name'],
                firstName: $item['first_name'],
                middleName: $item['middle_name'],
                lastName: $item['last_name'],
                suffix: $item['suffix'],
                nickname: $item['nickname'],
                district: $item['district'],
                ftmEid: $item['ftm_eid'],
                votesmartId: $item['votesmart_id'],
                opensecretsId: $item['opensecrets_id'],
                knowwhoPid: $item['knowwho_pid'],
                ballotpedia: $item['ballotpedia'],
                bioguideId: $item['bioguide_id'],
                sponsorTypeId: $item['sponsor_type_id'],
                sponsorOrder: $item['sponsor_order'],
                committeeSponsor: $item['committee_sponsor'],
                committeeId: $item['committee_id'],
                stateFederal: $item['state_federal'],
                bio: new BillResponseSponsorBio(
                    social: new BillResponseSponsorBioSocial(
                        capitolPhone: $item['bio']['social']['capitol_phone'],
                        districtPhone: $item['bio']['social']['district_phone'],
                        email: $item['bio']['social']['email'],
                        webmail: $item['bio']['social']['webmail'],
                        biography: $item['bio']['social']['biography'],
                        image: $item['bio']['social']['image'],
                        ballotpedia: $item['bio']['social']['ballotpedia'],
                        votesmart: $item['bio']['social']['votesmart'],
                    ),
                    capitolAddress: new BillResponseSponsorBioCapitolAddress(
                        address1: $item['bio']['capitol_address']['address1'],
                        address2: $item['bio']['capitol_address']['address2'],
                        city: $item['bio']['capitol_address']['city'],
                        state: $item['bio']['capitol_address']['state'],
                        zip: $item['bio']['capitol_address']['zip'],
                    ),
                    links: new BillResponseSponsorBioLinks(
                        official: new BillResponseSponsorBioLink(
                            bluesky: $item['bio']['links']['official']['bluesky'],
                            facebook: $item['bio']['links']['official']['facebook'],
                            instagram: $item['bio']['links']['official']['instagram'],
                            linkedin: $item['bio']['links']['official']['linkedin'],
                            tiktok: $item['bio']['links']['official']['tiktok'],
                            twitter: $item['bio']['links']['official']['twitter'],
                            website: $item['bio']['links']['official']['website'],
                            youtube: $item['bio']['links']['official']['youtube'],
                        ),
                        personal: new BillResponseSponsorBioLink(
                            bluesky: $item['bio']['links']['personal']['bluesky'],
                            facebook: $item['bio']['links']['personal']['facebook'],
                            instagram: $item['bio']['links']['personal']['instagram'],
                            linkedin: $item['bio']['links']['personal']['linkedin'],
                            tiktok: $item['bio']['links']['personal']['tiktok'],
                            twitter: $item['bio']['links']['personal']['twitter'],
                            website: $item['bio']['links']['personal']['website'],
                            youtube: $item['bio']['links']['personal']['youtube'],
                        ),
                    ),
                ),
            );
        }
    }
}
