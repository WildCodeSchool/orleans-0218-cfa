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
        $partner = new partnair();
        $partner->setName('uniformation');
        $partner->setLink('http://www.uniformation.fr/');
        $partner->setImage('images/Logo_uniformation.jpg');
        $manager->persist($partner);

        $partner2 = new partnair();
        $partner2->setName('cpnef');
        $partner2->setLink('http://www.uniformation.fr/');
        $partner2->setImage('images/logo_CPNEF_quadri.jpg');
        $manager->persist($partner2);

        $partner3 = new partnair();
        $partner3->setName('unifaf');
        $partner3->setLink('http://www.uniformation.fr/');
        $partner3->setImage('images/Logo UNIFAF.jpg');
        $manager->persist($partner3);

        $partner4 = new partnair();
        $partner4->setName('unifaf');
        $partner4->setLink('http://www.uniformation.fr/');
        $partner4->setImage('images/Logo OETH.jpg');
        $manager->persist($partner4);

        $partner5 = new partnair();
        $partner5->setName('unifaf');
        $partner5->setLink('http://www.uniformation.fr/');
        $partner5->setImage('images/Logo FNAPSS.jpg');
        $manager->persist($partner5);

        $partner6 = new partnair();
        $partner6->setName('unifaf');
        $partner6->setLink('http://www.uniformation.fr/');
        $partner6->setImage('images/logo FIPHFP.jpg');
        $manager->persist($partner6);

        $partner7 = new partnair();
        $partner7->setName('unifaf');
        $partner7->setLink('http://www.uniformation.fr/');
        $partner7->setImage('images/Afcasa.jpg');
        $manager->persist($partner7);

        $partner8 = new partnair();
        $partner8->setName('unifaf');
        $partner8->setLink('http://www.uniformation.fr/');
        $partner8->setImage('images/logo-region.jpg');
        $manager->persist($partner8);

        $partner10 = new partnair();
        $partner10->setName('b');
        $partner10->setLink('http://www.uniformation.fr/');
        $partner10->setImage('images/Logo MFR Azay.png');
        $manager->persist($partner10);


        $partner11 = new partnair();
        $partner11->setName('b');
        $partner11->setLink('http://www.uniformation.fr/');
        $partner11->setImage('images/Logo MFR.bmp');
        $manager->persist($partner11);

        $manager->flush();

    }
}
