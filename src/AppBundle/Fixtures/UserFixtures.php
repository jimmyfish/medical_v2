<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 26/12/17
 * Time: 3:25.
 */

namespace AppBundle\Fixtures;

use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class UserFixtures extends Fixture
{
    /**
     * Load data fixtures with the passed EntityManager.
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 0; $i < 5; ++$i) {
            $user = new User();

            $user->setName($faker->firstName.' '.$faker->lastName);
            $user->setUsername($faker->userName);
            $user->setPassword('faster');
            $user->setEmail($faker->email);
            $user->setAlamat($faker->address);
            $user->setTelp('08990314474');
            $user->setBagian('HRD');
            $user->setJabatan('Staff');
            $user->setRoles(['ROLE_USER']);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
