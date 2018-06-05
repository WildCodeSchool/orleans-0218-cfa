<?php
/**
 * Created by PhpStorm.
 * User: gollum
 * Date: 05/06/18
 * Time: 16:26
 */

namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Event;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        $event = new Event();
        $event->setTitle($faker->sentence(6));
        $event->setDate(new \DateTime());
        $event->setDescription($faker->text());

        $manager->persist($event);
        $manager->flush();
    }
}