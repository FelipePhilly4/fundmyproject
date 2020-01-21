<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixtures extends Fixture
{
    private $encoder;

    /**
     * UserFixtures constructor.
     */

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setFirstname("Badi");
        $admin->setLastname("Phil");
        $admin->setEmail("azerty@mail.com");
        $admin->setPassword($this->encoder->encodePassword($admin,"azerty"));
        $admin->setRoles(["ROLE_ADMIN"]);
        $manager->persist($admin);

        $jack = new User();
        $jack->setFirstname("Jack");
        $jack->setLastname("Smith");
        $jack->setEmail("lorem@mail.com");
        $jack->setPassword($this->encoder->encodePassword($jack,"lorem"));
        $jack->setRoles(["ROLE_USER"]);
        $manager->persist($jack);

        $maria = new User();
        $maria->setFirstname("Maria");
        $maria->setLastname("Martin");
        $maria->setEmail("ipsum@mail.com");
        $maria->setPassword($this->encoder->encodePassword($maria,"ipsum"));
        $maria->setRoles(["ROLE_USER"]);
        $manager->persist($maria);

        
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
