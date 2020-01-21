<?php

namespace App\DataFixtures;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $film = new Category();
        $film->setName("Good Girl");
        $manager->persist($film);
        $this->addReference("category-film", $film);

        $sport = new Category();
        $sport->setName("Sport");
        $manager->persist($sport);
        $this->addReference("category-sport", $sport);

        $jeux = new Category();
        $jeux->setName("Dabado");
        $manager->persist($jeux);
        $this->addReference("category-jeux", $jeux);

        $musique = new Category();
        $musique->setName("Doosh");
        $manager->persist($film);
        $this->addReference("category-musique", $musique);
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
