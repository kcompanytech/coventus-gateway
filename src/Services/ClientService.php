<?php

namespace Kcompany\CoventusGateway\Services;

use Kcompany\CoventusGateway\Services\LoginService;
use Kcompany\CoventusGateway\Services\FinansService;
use Kcompany\CoventusGateway\Services\MemberService;
use Kcompany\CoventusGateway\Services\BookingService;
use Kcompany\CoventusGateway\Services\CategoryService;
use Kcompany\CoventusGateway\Services\ResourceService;
use Kcompany\CoventusGateway\Services\DepartmentService;
use Kcompany\CoventusGateway\Services\OrganizationService;

class ClientService
{
    /**
     *
     * @var BookingService
     */
    private BookingService $bookingService;
    /**
     *
     * @var CategoryService
     */
    private CategoryService $categoryService;
    /**
     *
     * @var DepartmentService
     */
    private DepartmentService $departmentService;
    /**
     *
     * @var FinansService
     */
    private FinansService $finansService;
    /**
     *
     * @var GroupService
     */
    private GroupService $groupService;
    /**
     *
     * @var LoginService
     */
    private LoginService $loginService;
    /**
     *
     * @var MemberService
     */
    private MemberService $memberService;
    /**
     *
     * @var OrganizationService
     */
    private OrganizationService $organizationService;
    /**
     *
     * @var ResourceService
     */
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
     *
     * @return BookingService
     */
    public function getBookingService(): BookingService
    {
        return $this->bookingService;
    }
    
    /**
     * getCategoryService
     *
     * @return CategoryService
     */
    public function getCategoryService(): CategoryService
    {
        return $this->categoryService;
    }
    
    /**
     * getDepartmentService
     *
     * @return DepartmentService
     */
    public function getDepartmentService(): DepartmentService
    {
        return $this->departmentService;
    }
    
    /**
     * getFinansService
     *
     * @return FinansService
     */
    public function getFinansService(): FinansService
    {
        return $this->finansService;
    }
    
    /**
     * getGroupService
     *
     * @return GroupService
     */
    public function getGroupService(): GroupService
    {
        return $this->groupService;
    }
    
    /**
     * getLoginService
     *
     * @return LoginService
     */
    public function getLoginService(): LoginService
    {
        return $this->loginService;
    }
    
    /**
     * getMemberService
     *
     * @return MemberService
     */
    public function getMemberService(): MemberService
    {
        return $this->memberService;
    }
    
    /**
     * getOrganizationService
     *
     * @return OrganizationService
     */
    public function getOrganizationService(): OrganizationService
    {
        return $this->organizationService;
    }
    
    /**
     * getResourceService
     *
     * @return ResourceService
     */
    public function getResourceService(): ResourceService
    {
        return $this->resourceService;
    }
}