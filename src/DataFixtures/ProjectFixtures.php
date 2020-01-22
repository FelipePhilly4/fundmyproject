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
        $goodgirl->setgoal(5500.00);
        $goodgirl->prePersist();
        $goodgirl->addCategory($this->getReference("category-film"));
        $goodgirl->setUser($this->getReference("Jack"));
        $this->addReference("goodgirl", $goodgirl);
        $manager->persist($goodgirl);

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