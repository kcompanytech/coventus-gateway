<?php

namespace Kcompany\CoventusGateway\Services;

class GroupService extends BaseClientService
{
    public function getGroup()
    {
        return $this->curlService->get('');
    }

    public function getGroups()
    {
        return $this->curlService->get('');
    }

    public function getGroupsTimeAndPlace()
    {
        return $this->curlService->get('');
    }

    public function getGroupsMember()
    {
        return $this->curlService->get('');
    }
}
