<?php
namespace App\Menu;

use App\Entity\Hotel;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\HttpFoundation\RequestStack;

final class Builder
{
    private $factory;
    private EntityManagerInterface $entityManager;

    public function __construct(FactoryInterface $factory,EntityManagerInterface $entityManager)
    {
        $this->factory = $factory;
        $this->entityManager = $entityManager;
    }

    public function mainMenu(RequestStack $requestStack): ItemInterface
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Home', ['route' => 'app_home']);
        $menu->addChild('About Us', ['route' => 'app_about']);
        $menu->addChild('Contact Us', ['route' => 'app_contact_us_new']);
        $menu->addChild('Hotels', ['route' => 'app_hotel_index']);

        // access services from the container!
        // findMostRecent and Blog are just imaginary examples
        /** @var Hotel[] $hotels */
        $hotels = $this->entityManager->getRepository(Hotel::class)->findAll();


        foreach ($hotels as $hotel){
            $menu['Hotels']->addChild($hotel->getName(), [
                'route' => 'app_hotel_show',
                'routeParameters' => ['id' => $hotel->getId()]
            ]);
        }


        return $menu;
    }
}