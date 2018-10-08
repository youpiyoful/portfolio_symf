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
        $menu['Accueil']->setAttribute('class', "nav-item nav-link active");
        $menu->addChild('Category', ['route' => 'category_index']);
        $menu['Category']->setAttribute('class', "nav-item nav-link"); 
        $menu->addChild('Competence', ['route' => 'competence_index']);
        $menu['Competence']->setAttribute('class', "nav-item nav-link");
        $menu->addChild('Contact', ['route' => 'contact_index']);
        $menu['Contact']->setAttribute('class', "nav-item nav-link");
        $menu->addChild('Project', ['route' => 'project_index']);
        $menu['Project']->setAttribute('class', "nav-item nav-link");
        // ... add more children

        return $menu;
    }
}
