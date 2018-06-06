<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 05/06/18
 * Time: 15:52
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Partnair;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class PartnairFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 0; $i < 20; $i++) {
            $partnair = new Partnair();
            $partnair->setName($faker->name);
            $partnair->setImage($faker->imageUrl(80, 80));
            $partnair->setLink($faker->url);

            $manager->persist($partnair);

            $this->addreference('partnair' . $i, $partnair);
        }
        $manager->flush();
    }

}
