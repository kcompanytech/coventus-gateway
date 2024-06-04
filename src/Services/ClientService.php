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

    private ResourceService $resourceService;

    public function __construct(
        BookingService $bookingService,
        CategoryService $categoryService,
        DepartmentService $departmentService,
        FinansService $finansService,
        GroupService $groupService,
        LoginService $loginService,
        MemberService $memberService,
        ResourceService $resourceService,
    ) {
        $this->bookingService = $bookingService;
        $this->categoryService = $categoryService;
        $this->departmentService = $departmentService;
        $this->finansService = $finansService;
        $this->groupService = $groupService;
        $this->loginService = $loginService;
        $this->memberService = $memberService;
        $this->resourceService = $resourceService;
    }

    public function getBookingService(): BookingService
    {
        return $this->bookingService;
    }

    public function getCategoryService(): CategoryService
    {
        return $this->categoryService;
    }

    public function getDepartmentService(): DepartmentService
    {
        return $this->departmentService;
    }

    public function getFinansService(): FinansService
    {
        return $this->finansService;
    }

    public function getGroupService(): GroupService
    {
        return $this->groupService;
    }

    public function getLoginService(): LoginService
    {
        return $this->loginService;
    }

    public function getMemberService(): MemberService
    {
        return $this->memberService;
    }

    public function getResourceService(): ResourceService
    {
        return $this->resourceService;
    }
}
