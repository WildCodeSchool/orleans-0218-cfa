<?php
/**
 * Created by PhpStorm.
 * User: wilder14
 * Date: 12/06/18
 * Time: 17:46
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Formation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class FormationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 0; $i < 13; $i++) {
            $formation = new Formation();
            $formation->setName($faker->sentence(2));
            $formation->setShortPresentation($faker->sentence(150));
            $formation->setJobDescription($faker->sentence(50));

            $manager->persist($formation);

            $this->addreference('formation' . $i, $formation);
        }
        $manager->flush();
    }
}
