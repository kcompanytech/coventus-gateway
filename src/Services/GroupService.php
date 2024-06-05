<?php

namespace Kcompany\CoventusGateway\Services;

use InvalidArgumentException;
use Types;

class GroupService extends BaseClientService
{
    public function getGroup(int $id)
    {
        if (! isset($id)) {
            throw new InvalidArgumentException('Missing id');
        }

        return $this->curlService->get('dataudv/api/adressebog/get_gruppe.php', intval($id));
    }

    public function getGroups(?array $ids, ?int $departmentId, ?string $type, ?array $activities, ?bool $public, ?bool $showMemberlist, ?bool $onlineBooking, bool $active = true)
    {
        $data = [];

        if (isset($ids)) {
            $ids = implode(',', $ids);
            $data['ider'] = $ids;
        }

        if (isset($departmentId)) {
            $data['afdeling'] = $departmentId;
        }

        if (isset($type)) {
            if ($type != 'hold' || $type != 'udvalg') {
                throw new InvalidArgumentException('Only "hold" or "udvalg" is accepted');
            }
            $type = $this->types($type);
        }

        if (isset($activities)) {
            $activities = implode(',', $activities);
            $data['aktiviteter'] = $activities;
        }

        if (isset($public)) {
            $data['offentlig'] = $public;
        }

        if (isset($showMemberlist)) {
            $data['vis_medlemsliste'] = $showMemberlist;
        }

        if (isset($onlineBooking)) {
            $data['online_tilmelding'] = $onlineBooking;
        }

        if (! $active) {
            $data['aktiv'] = $active;
        }

        return $this->curlService->get('dataudv/api/adressebog/get_grupper.php', $data);
    }

    public function getGroupsTimeAndPlace(array $ids = [])
    {
        if (! isset($ids)) {
            throw new InvalidArgumentException('Missing a list of groups');
        }
        $ids = implode(',', $ids);

        return $this->curlService->get('dataudv/api/adressebog/get_tid_sted.php', ['grupper' => $ids]);
    }

    public function getGroupsMember()
    {
        return $this->curlService->get('dataudv/api/adressebog/get_grupper.php');
    }

    private function types(Types|string $type)
    {
        if (is_string($type)) {
            $type = ucfirst(strtolower($type)); // Normalize the string
            $type = Types::from($type);
        }

        return match ($type) {
            Types::Hold => 'hold',
            Types::Udvalg => 'udvalg'
        };
    }
}
