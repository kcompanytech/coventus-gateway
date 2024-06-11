<?php

namespace Kcompany\CoventusGateway\Services;

use InvalidArgumentException;
use Kcompany\CoventusGateway\Services\HelperTrait;

class GroupService extends BaseClientService
{
    use HelperTrait;
    
    /**
     * getGroup
     *
     * @param  int $id
     * @return array
     */
    public function getGroup(int $id): array|string|null
    {
        if (!isset($id)) throw new InvalidArgumentException("Missing id");

        return $this->curlService->get('dataudv/api/adressebog/get_gruppe.php', ['id' => $id]);
    }
    
    /**
     * getGroups
     *
     * @param  array $ids
     * @param  int $departmentId
     * @param  string $type
     * @param  array $activities
     * @param  bool $public
     * @param  bool $showMemberlist
     * @param  bool $onlineBooking
     * @param  bool $active
     * @return array
     */
    public function getGroups(array $ids = [], int $departmentId, string $type, array $activities = [], bool $public = false, bool $showMemberlist = false, bool $onlineBooking = false, bool $active = true): array|string|null
    {
        $params = [];

        if (!isset($ids)) {
            throw new InvalidArgumentException('Missing array of ids');
        }

        $ids = implode(',', $ids);
        $params['ider'] = $ids;

        if(isset($departmentId)) $params['afdeling'] = $departmentId;

        if(isset($type)) {
            // The list of accepted types
            $acceptedTypes = ['hold', 'udvalg'];

            // Check if $type is not in the accepted types
            if (!in_array($type, $acceptedTypes, true)) {
                throw new InvalidArgumentException('Only "hold" or "udvalg" is accepted');
            }
            $params['type'] = $type;
            
        }

        if(isset($activities)) {
            $activities = implode(',', $activities);
            $params['aktiviteter'] = $activities;
        }

        $params['offentlig'] = $public;
        
        $params['vis_medlemsliste'] = $showMemberlist;

        $params['online_tilmelding'] = $onlineBooking;

        $params['aktiv'] = $active;

        return $this->curlService->get('dataudv/api/adressebog/get_grupper.php', $params);
    }
    
    /**
     * getGroupsTimeAndPlace
     *
     * @param  array $ids
     * @return array
     */
    public function getGroupsTimeAndPlace(array $ids = []): array|string|null
    {
        if (!isset($ids)) throw new InvalidArgumentException("Missing a list of groups");
        $ids = implode(',', $ids);

        return $this->curlService->get('dataudv/api/adressebog/get_tid_sted.php', ['grupper' => $ids]);
    }
    
    /**
     * getGroupsMember
     *
     * @param  array $ids
     * @param  string $type
     * @param  bool $confirmation
     * @param  bool $deleted
     * @param  bool $extraFields
     * @return array
     */
    public function getGroupsMember(array $ids = [], string $type, bool $confirmation = false, bool $deleted = false, bool $extraFields = false): array|string|null
    {
        $params = [];

        if (!isset($ids)) throw new InvalidArgumentException("Missing a list of groups");
        $params['ider'] = implode(',', $ids);   

        if(isset($type)) {
            // The list of accepted types
            $acceptedTypes = ['person', 'medlem', 'virksomhed'];

            // Check if $type is not in the accepted types
            if (!in_array($type, $acceptedTypes, true)) {
                throw new InvalidArgumentException('Only "person", "medlem", or "virksomhed" is accepted');
            }
            $params['type'] = $type;
            
        }

        $params['Mangler_bekraeftelse'] = $confirmation;

        $params['slettet'] = $deleted;

        $params['ekstra_felter'] = $extraFields;

        return $this->curlService->get('dataudv/api/adressebog/get_grupper.php', $params);
    }
}