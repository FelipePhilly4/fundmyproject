<?php

namespace App\DataFixtures;

use App\Entity\Contribution;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ContributionFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $amount = new Contribution();
        $amount->setAmount(1000.00);
        $amount->setUser($this->getReference("Jack"));
        $amount->setProject($this->getReference("goodgirl"));
        $this->setReference("amount", $amount);
        $manager->persist($amount);

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
            UserFixtures::class,
            ProjectFixtures::class
        ];

    }
}
