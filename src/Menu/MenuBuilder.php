<?php

namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;


class MenuBuilder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     *
     * Add any other dependency you need
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(array $options)
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Accueil', ['route' => 'accueil_index']);
        $menu->addChild('Category', ['route' => 'category_index']);
        $menu->addChild('Competence', ['route' => 'competence_index']);
        $menu->addChild('Contact', ['route' => 'contact_index']);
        $menu->addChild('Project', ['route' => 'project_index']);
        // ... add more children

        return $menu;
    }
}
