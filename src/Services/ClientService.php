<?php

namespace Kcompany\CoventusGateway\Services;

class ClientService
{
    private BookingService $bookingService;

    private CategoryService $categoryService;

    private DepartmentService $departmentService;

    private FinansService $finansService;

    private GroupService $groupService;

    private LoginService $loginService;

    private MemberService $memberService;

    private OrganizationService $organizationService;

    private ResourceService $resourceService;

    public function __construct(
        BookingService $bookingService,
        CategoryService $categoryService,
        DepartmentService $departmentService,
        FinansService $finansService,
        GroupService $groupService,
        LoginService $loginService,
        MemberService $memberService,
        OrganizationService $organizationService,
        ResourceService $resourceService,
    ) {
        $this->bookingService = $bookingService;
        $this->categoryService = $categoryService;
        $this->departmentService = $departmentService;
        $this->finansService = $finansService;
        $this->groupService = $groupService;
        $this->loginService = $loginService;
        $this->memberService = $memberService;
        $this->organizationService = $organizationService;
        $this->resourceService = $resourceService;
    }

    /**
     * getBookingService
     */
    public function getBookingService(): BookingService
    {
        return $this->bookingService;
    }

    /**
     * getCategoryService
     */
    public function getCategoryService(): CategoryService
    {
        return $this->categoryService;
    }

    /**
     * getDepartmentService
     */
    public function getDepartmentService(): DepartmentService
    {
        return $this->departmentService;
    }

    /**
     * getFinansService
     */
    public function getFinansService(): FinansService
    {
        return $this->finansService;
    }

    /**
     * getGroupService
     */
    public function getGroupService(): GroupService
    {
        return $this->groupService;
    }

    /**
     * getLoginService
     */
    public function getLoginService(): LoginService
    {
        return $this->loginService;
    }

    /**
     * getMemberService
     */
    public function getMemberService(): MemberService
    {
        return $this->memberService;
    }

    /**
     * getOrganizationService
     */
    public function getOrganizationService(): OrganizationService
    {
        return $this->organizationService;
    }

    /**
     * getResourceService
     */
    public function getResourceService(): ResourceService
    {
        return $this->resourceService;
    }
}
