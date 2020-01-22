<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $goodgirl = new Project();
        $goodgirl->setName("Good Girl");
        $goodgirl->setImage("project1.jpg");
        $goodgirl->setExcerpt("Ce film parle de ...");
        $goodgirl->setDescription("Lorem ipsum");
        $goodgirl->setgoal(55500.00);
        $goodgirl->prePersist();
        $goodgirl->addCategory($this->getReference("category-film"));
        $goodgirl->setUser($this->getReference("Jack"));
        $this->addReference("goodgirl", $goodgirl);
        $manager->persist($goodgirl);

        $lesyeuxdesbleus = new Project();
        $lesyeuxdesbleus->setName("Les yeux des bleus");
        $lesyeuxdesbleus->setImage("project2.jpg");
        $lesyeuxdesbleus->setExcerpt("Revivez l'épopée de l'EDF lors du mondial de football 2018.");
        $lesyeuxdesbleus->setDescription("Lorem ipsum");
        $lesyeuxdesbleus->setgoal(60000.00);
        $lesyeuxdesbleus->prePersist();
        $lesyeuxdesbleus->addCategory($this->getReference("category-film"));
        $lesyeuxdesbleus->addCategory($this->getReference("category-sport"));
        $lesyeuxdesbleus->setUser($this->getReference("Jack"));
        $this->addReference("lesyeuxdesbleus", $lesyeuxdesbleus);
        $manager->persist($lesyeuxdesbleus);

        $dabado = new Project();
        $dabado->setName("Dabado");
        $dabado->setImage("project3.jpg");
        $dabado->setExcerpt("Un jeu fantastique peint à la main. Plongez dans des aventures extra-ordinaires !");
        $dabado->setDescription("Lorem ipsum");
        $dabado->setgoal(30000.00);
        $dabado->prePersist();
        $dabado->addCategory($this->getReference("category-jeux"));
        $dabado->setUser($this->getReference("Maria"));
        $this->addReference("dabado", $dabado);
        $manager->persist($dabado);

        $doosh = new Project();
        $doosh->setName("DOOSH");
        $doosh->setImage("project4.jpg");
        $doosh->setExcerpt("Venez m'accompagner dans mon projet de création musicale avec clip vidéo !");
        $doosh->setDescription("Lorem ipsum");
        $doosh->setgoal(80000.00);
        $doosh->prePersist();
        $doosh->addCategory($this->getReference("category-musique"));
        $doosh->addCategory($this->getReference("category-film"));
        $doosh->setUser($this->getReference("Norma"));
        $this->addReference("doosh", $doosh);
        $manager->persist($doosh);

        $manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
            UserFixtures::class
        ];
    }
}