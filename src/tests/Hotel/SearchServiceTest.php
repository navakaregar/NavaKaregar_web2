<?php

namespace App\Tests\Hotel;

use App\Hotel\SearchService;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class SearchServiceTest extends TestCase
{

    public function testMakeSearchParameter(){

        $searchService = new SearchService(null);
        $actual = $searchService->makeSearchParameter("test");
        $this -> assertEquals("%test%",$actual);
    }

    public function testMakeSearchParameter2(){

        $this->expectException(InvalidArgumentException::class);

        $searchService = new SearchService(null);
        $actual = $searchService->makeSearchParameter(null);
    }

}