<?php

use Kcompany\CoventusGateway\Services\BookingService;
use Kcompany\CoventusGateway\Services\CategoryService;
use Kcompany\CoventusGateway\Services\ClientService;
use Kcompany\CoventusGateway\Services\DepartmentService;
use Kcompany\CoventusGateway\Services\FinansService;
use Kcompany\CoventusGateway\Services\GroupService;
use Kcompany\CoventusGateway\Services\LoginService;
use Kcompany\CoventusGateway\Services\MemberService;
use Kcompany\CoventusGateway\Services\OrganizationService;
use Kcompany\CoventusGateway\Services\ResourceService;

it('can create a ClientService and return the correct services', function () {
    // Mock the services
    $bookingService = Mockery::mock(BookingService::class);
    $categoryService = Mockery::mock(CategoryService::class);
    $departmentService = Mockery::mock(DepartmentService::class);
    $finansService = Mockery::mock(FinansService::class);
    $groupService = Mockery::mock(GroupService::class);
    $loginService = Mockery::mock(LoginService::class);
    $memberService = Mockery::mock(MemberService::class);
    $organizationService = Mockery::mock(OrganizationService::class);
    $resourceService = Mockery::mock(ResourceService::class);

    // Create the ClientService instance
    $clientService = new ClientService(
        $bookingService,
        $categoryService,
        $departmentService,
        $finansService,
        $groupService,
        $loginService,
        $memberService,
        $organizationService,
        $resourceService
    );

    // Assert that the getters return the correct services
    expect($clientService->getBookingService())->toBe($bookingService);
    expect($clientService->getCategoryService())->toBe($categoryService);
    expect($clientService->getDepartmentService())->toBe($departmentService);
    expect($clientService->getFinansService())->toBe($finansService);
    expect($clientService->getGroupService())->toBe($groupService);
    expect($clientService->getLoginService())->toBe($loginService);
    expect($clientService->getMemberService())->toBe($memberService);
    expect($clientService->getOrganizationService())->toBe($organizationService);
    expect($clientService->getResourceService())->toBe($resourceService);
});

afterEach(function () {
    Mockery::close();
});
