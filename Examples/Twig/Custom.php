<?php

namespace App\Twig;

use App\Entity\Beer;
use App\Entity\Category;
use Twig\TwigFilter;
use Twig\Extension\AbstractExtension;
use Doctrine\Persistence\ObjectManager;
use Twig\TwigFunction;

class Custom extends AbstractExtension
{
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('special', function (Beer $beer) {
                return $this->special($beer);
            }),
            new TwigFunction('normal', function (Beer $beer) {
                return $this->normal($beer);
            }),
        ];
    }

    public function special(Beer $beer)
    {
        return $this->manager->getRepository(Beer::class)->findCategory('special', $beer->getId());
    }

    public function normal(Beer $beer)
    {

        return  $this->manager->getRepository(Beer::class)->findCategory('normal', $beer->getId());
    }
}
