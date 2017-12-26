<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 26/12/17
 * Time: 22:32.
 */

namespace AppBundle\Fixtures;

use AppBundle\Entity\Laboratorium;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LabFixtures extends Fixture
{
    /**
     * Load data fixtures with the passed EntityManager.
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $data1 = new Laboratorium();
        $data2 = new Laboratorium();
        $data3 = new Laboratorium();
    }
}
