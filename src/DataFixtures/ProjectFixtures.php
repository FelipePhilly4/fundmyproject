<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProjectFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $goodgirl = new Project();
        $goodgirl->setName("Good Girl");
        $goodgirl->setImage("project1.png");
        $goodgirl->setExcerpt("Ce film parle de ...");
        $goodgirl->setDescription("Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium amet at aut blanditiis corporis culpa deleniti dignissimos eos ex facilis inventore iusto laudantium odit, quibusdam rerum, sapiente sequi temporibus.");
        $goodgirl->setGoal(5500.00);
        $goodgirl->setCreatedAt(New\DateTime());
        $goodgirl->addCategory($this->getReference("category-film"));
        $manager->persist($goodgirl);

        $lesyeuxdanslebus = new Project();
        $lesyeuxdanslebus->setName("Les yeux dans le bus");
        $lesyeuxdanslebus->setImage("placeholder.png");
        $lesyeuxdanslebus->setExcerpt("Revivez la grande épopée de l'équipe de France de football lors du mondial de football 2010.");
        $lesyeuxdanslebus->setDescription("Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium amet at aut blanditiis corporis culpa deleniti dignissimos eos ex facilis inventore iusto laudantium odit, quibusdam rerum, sapiente sequi temporibus.");
        $lesyeuxdanslebus->setGoal(5500.00);
        $lesyeuxdanslebus->setCreatedAt(New\DateTime());
        $lesyeuxdanslebus->addCategory($this->getReference("category-sport"));
        $manager->persist($lesyeuxdanslebus);

        $dabado = new Project();
        $dabado->setName("Dabado");
        $dabado->setImage("project2.png");
        $dabado->setExcerpt("Un jeu fantastique peint à la main. Plongez dans des aventures extra-ordinaires !");
        $dabado->setDescription("Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium amet at aut blanditiis corporis culpa deleniti dignissimos eos ex facilis inventore iusto laudantium odit, quibusdam rerum, sapiente sequi temporibus.");
        $dabado->setGoal(5500.00);
        $dabado->setCreatedAt(New\DateTime());
        $dabado->addCategory($this->getReference("category-jeux"));
        $manager->persist($dabado);

        $doosh = new Project();
        $doosh->setName("Doosh");
        $doosh->setImage("project3.png");
        $doosh->setExcerpt("Venez m'accompagner dans mon projet de création musicale avec clip vidéo !");
        $doosh->setDescription("Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium amet at aut blanditiis corporis culpa deleniti dignissimos eos ex facilis inventore iusto laudantium odit, quibusdam rerum, sapiente sequi temporibus.");
        $doosh->setGoal(5500.00);
        $doosh->setCreatedAt(New\DateTime());
        $doosh->addCategory($this->getReference("category-jeux"));
        $manager->persist($doosh);


        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function getDependencies()
    {
        return [
            CategoryFixtures::class
        ];
    }
}