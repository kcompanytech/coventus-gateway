<?php

namespace Kcompany\Resources\Booking;

class Resource
{
    private $id;
    private $organization;
    private $name;
    private $bookingCategoryRequired;
    private $resourceGroup;

    public function __construct($data)
    {
        $this->id = $data['id'] ?? null;
        $this->organization = new Organization($data['organization']);
        $this->name = $data['name'] ?? null;
        $this->bookingCategoryRequired = $data['bookingCategoryRequired'] ?? null;
        $this->resourceGroup = new ResourceGroup($data['resourceGroup']);
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getOrganization()
    {
        return $this->organization;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getBookingCategoryRequired()
    {
        return $this->bookingCategoryRequired;
    }

    public function getResourceGroup()
    {
        return $this->resourceGroup;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setOrganization($organization)
    {
        $this->organization = $organization;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setBookingCategoryRequired($bookingCategoryRequired)
    {
        $this->bookingCategoryRequired = $bookingCategoryRequired;
    }

    public function setResourceGroup($resourceGroup)
    {
        $this->resourceGroup = $resourceGroup;
    }
}
