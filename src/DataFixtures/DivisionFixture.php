<?php

namespace App\DataFixtures;

use App\Entity\Division;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class DivisionFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $divisionsData = array(
            array('Direction', 'direction@contact.com'),
            array('Ressources humaines', 'RH@contact.com'),
            array('Communnication', 'com@contact.com'),
            array('Developpement', 'dev@contact.com')
        );
        $divisionNumber = count($divisionsData);
        for ($i = 0; $i < $divisionNumber; $i++) {
            $division = new Division();
            $division->setName($divisionsData[$i][0]);
            $division->setEmail($divisionsData[$i][1]);
            $manager->persist($division);
        }
        $manager->flush();
    }
}
