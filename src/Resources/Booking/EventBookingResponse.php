<?php

namespace Kcompany\Resources\Booking;

class EventBookingResponse
{
    private $id;

    private $organization;

    private $resource;

    private $category;

    private $start;

    private $end;

    private $title;

    private $info;

    private $text;

    private $bookedBy;

    private $bookedByName;

    private $lastEditedBy;

    private $lastEditedByName;

    private $bookedTo;

    private $organizationalUnit;

    private $pin;

    private $accessControlUnlock;

    private $serie;

    private $bookingType;

    private $bookingContext;

    private $bookingGroups;

    private $maxParticipants;

    private $getEventEnabled;

    private $getEventImage;

    private $ruleId;

    private $attendance;

    private $numberOfGuests;

    private $participants;

    public function __construct($data)
    {
        $this->id = $data['id'] ?? null;
        $this->organization = new Organization($data['organization']);
        $this->resource = new Resource($data['resource']);
        $this->category = $data['category'] ?? null;
        $this->start = $data['start'] ?? null;
        $this->end = $data['end'] ?? null;
        $this->title = $data['title'] ?? null;
        $this->info = $data['info'] ?? null;
        $this->text = $data['text'] ?? null;
        $this->bookedBy = $data['bookedBy'] ?? null;
        $this->bookedByName = $data['bookedByName'] ?? null;
        $this->lastEditedBy = $data['lastEditedBy'] ?? null;
        $this->lastEditedByName = $data['lastEditedByName'] ?? null;
        $this->bookedTo = $data['bookedTo'] ?? null;
        $this->organizationalUnit = $data['organizationalUnit'] ?? null;
        $this->pin = $data['pin'] ?? null;
        $this->accessControlUnlock = $data['accessControlUnlock'] ?? null;
        $this->serie = $data['serie'] ?? null;
        $this->bookingType = $data['bookingType'] ?? null;
        $this->bookingContext = $data['bookingContext'] ?? null;
        $this->bookingGroups = $data['bookingGroups'] ?? null;
        $this->maxParticipants = $data['maxParticipants'] ?? null;
        $this->getEventEnabled = $data['getEventEnabled'] ?? null;
        $this->getEventImage = $data['getEventImage'] ?? null;
        $this->ruleId = $data['ruleId'] ?? null;
        $this->attendance = $data['attendance'] ?? null;
        $this->numberOfGuests = $data['numberOfGuests'] ?? null;
        $this->participants = $data['participants'] ?? [];
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

    public function getResource()
    {
        return $this->resource;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getStart()
    {
        return $this->convertTimestamp($this->start);
    }

    public function getEnd()
    {
        return $this->convertTimestamp($this->end);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getInfo()
    {
        return $this->info;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getBookedBy()
    {
        return $this->bookedBy;
    }

    public function getBookedByName()
    {
        return $this->bookedByName;
    }

    public function getLastEditedBy()
    {
        return $this->lastEditedBy;
    }

    public function getLastEditedByName()
    {
        return $this->lastEditedByName;
    }

    public function getBookedTo()
    {
        return $this->bookedTo;
    }

    public function getOrganizationalUnit()
    {
        return $this->organizationalUnit;
    }

    public function getPin()
    {
        return $this->pin;
    }

    public function getAccessControlUnlock()
    {
        return $this->accessControlUnlock;
    }

    public function getSerie()
    {
        return $this->serie;
    }

    public function getBookingType()
    {
        return $this->bookingType;
    }

    public function getBookingContext()
    {
        return $this->bookingContext;
    }

    public function getBookingGroups()
    {
        return $this->bookingGroups;
    }

    public function getMaxParticipants()
    {
        return $this->maxParticipants;
    }

    public function getGetEventEnabled()
    {
        return $this->getEventEnabled;
    }

    public function getGetEventImage()
    {
        return $this->getEventImage;
    }

    public function getRuleId()
    {
        return $this->ruleId;
    }

    public function getAttendance()
    {
        return $this->attendance;
    }

    public function getNumberOfGuests()
    {
        return $this->numberOfGuests;
    }

    public function getParticipants()
    {
        return $this->participants;
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

    public function setResource($resource)
    {
        $this->resource = $resource;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function setStart($start)
    {
        $this->start = $start;
    }

    public function setEnd($end)
    {
        $this->end = $end;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setInfo($info)
    {
        $this->info = $info;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function setBookedBy($bookedBy)
    {
        $this->bookedBy = $bookedBy;
    }

    public function setBookedByName($bookedByName)
    {
        $this->bookedByName = $bookedByName;
    }

    public function setLastEditedBy($lastEditedBy)
    {
        $this->lastEditedBy = $lastEditedBy;
    }

    public function setLastEditedByName($lastEditedByName)
    {
        $this->lastEditedByName = $lastEditedByName;
    }

    public function setBookedTo($bookedTo)
    {
        $this->bookedTo = $bookedTo;
    }

    public function setOrganizationalUnit($organizationalUnit)
    {
        $this->organizationalUnit = $organizationalUnit;
    }

    public function setPin($pin)
    {
        $this->pin = $pin;
    }

    public function setAccessControlUnlock($accessControlUnlock)
    {
        $this->accessControlUnlock = $accessControlUnlock;
    }

    public function setSerie($serie)
    {
        $this->serie = $serie;
    }

    public function setBookingType($bookingType)
    {
        $this->bookingType = $bookingType;
    }

    public function setBookingContext($bookingContext)
    {
        $this->bookingContext = $bookingContext;
    }

    public function setBookingGroups($bookingGroups)
    {
        $this->bookingGroups = $bookingGroups;
    }

    public function setMaxParticipants($maxParticipants)
    {
        $this->maxParticipants = $maxParticipants;
    }

    public function setGetEventEnabled($getEventEnabled)
    {
        $this->getEventEnabled = $getEventEnabled;
    }

    public function setGetEventImage($getEventImage)
    {
        $this->getEventImage = $getEventImage;
    }

    public function setRuleId($ruleId)
    {
        $this->ruleId = $ruleId;
    }

    public function setAttendance($attendance)
    {
        $this->attendance = $attendance;
    }

    public function setNumberOfGuests($numberOfGuests)
    {
        $this->numberOfGuests = $numberOfGuests;
    }

    public function setParticipants($participants)
    {
        $this->participants = $participants;
    }

    // Helper method to convert timestamp to human-readable format
    private function convertTimestamp($timestamp)
    {
        $dateTime = new \DateTime();
        $dateTime->setTimestamp($timestamp / 1000); // Convert milliseconds to seconds

        return $dateTime->format('Y-m-d H:i:s');
    }
}
