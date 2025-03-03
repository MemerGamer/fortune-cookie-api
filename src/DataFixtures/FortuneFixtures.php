<?php

namespace App\DataFixtures;

use App\Entity\Fortune;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FortuneFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $fortunes = [
            "A great adventure awaits you.",
            "You will meet someone interesting today.",
            "Success comes to those who work for it.",
            "Happiness is a journey, not a destination."
        ];

        foreach ($fortunes as $fortuneMessage) {
            $manager->persist((new Fortune())->setMessage($fortuneMessage));
        }

        $manager->flush();
    }
}
