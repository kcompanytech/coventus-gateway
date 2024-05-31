<?php

namespace Kcompany\Resources\Booking;

class ResourceGroup
{
    private $id;

    private $title;

    private $availableToPublic;

    private $organization;

    public function __construct($data)
    {
        $this->id = $data['id'] ?? null;
        $this->title = $data['title'] ?? null;
        $this->availableToPublic = $data['availableToPublic'] ?? null;
        $this->organization = $data['organization'] ?? null;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAvailableToPublic()
    {
        return $this->availableToPublic;
    }

    public function getOrganization()
    {
        return $this->organization;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setAvailableToPublic($availableToPublic)
    {
        $this->availableToPublic = $availableToPublic;
    }

    public function setOrganization($organization)
    {
        $this->organization = $organization;
    }
}
