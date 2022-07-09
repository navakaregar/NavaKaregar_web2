<?php

use App\Entity\Hotel;
use App\Hotel\SearchService;
use \Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Doctrine\ORM\EntityManagerInterface;

class HotelIntegrationTest extends KernelTestCase{

    public function testHotelSearch(){
        self::bootKernel();
        $container = static::getContainer();

        $em = $container->get(EntityManagerInterface::class);
        $hotel=new Hotel();
        $hotel->setName("123 hotel 123");
        $hotel->setAddress("address 123");
        $em->persist($hotel);
        $em->flush();

        $hotelSearchService=$container->get(SearchService::class);
        $result = $hotelSearchService->search("hotel");
        $this->assertNotEmpty($result);
    }
}
