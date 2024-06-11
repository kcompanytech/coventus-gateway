<?php

namespace Kcompany\CoventusGateway\Services;

use InvalidArgumentException;

class MemberService extends BaseClientService
{
    use HelperTrait;

    /**
     * getMember
     *
     * @return array
     */
    public function getMember(int $id, bool $relation = false, bool $relationActive = false, bool $extraFields = false): array|string|null
    {
        $params = [];

        if (! isset($id)) {
            throw new InvalidArgumentException('Missing id');
        }

        $params['id'] = $id;

        $params['relationer'] = $relation;

        $params['relationer_aktiv'] = $relationActive;

        $params['extraFields'] = $extraFields;

        return $this->curlService->get('dataudv/api/adressebog/get_medlem.php', $params);
    }

    /**
     * getMembers
     *
     * @return array
     */
    public function getMembers(array $ids, string $type, bool $confirmation = false, bool $deleted = false, bool $relation = false, bool $relationActive = false, bool $extraFields = false): array|string|null
    {
        $params = [];

        if (! isset($ids)) {
            throw new InvalidArgumentException('Missing array of ids');
        }

        $ids = implode(',', $ids);
        $params['ider'] = $ids;

        if (isset($type)) {
            // The list of accepted types
            $acceptedTypes = ['person', 'medlem', 'virksomhed'];

            // Check if $type is not in the accepted types
            if (! in_array($type, $acceptedTypes, true)) {
                throw new InvalidArgumentException('Only "person", "medlem", or "virksomhed" is accepted');
            }
            $params['type'] = $type;

        }

        $params['Mangler_bekraeftelse'] = $confirmation;

        $params['slettet'] = $deleted;

        $params['relationer'] = $relation;

        $params['relationer_aktiv'] = $relationActive;

        $params['extraFields'] = $extraFields;

        return $this->curlService->get('dataudv/api/adressebog/get_gruppe.php', $params);
    }
}
