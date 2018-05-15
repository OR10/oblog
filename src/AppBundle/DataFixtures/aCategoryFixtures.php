<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class aCategoryFixtures extends Fixture
{
	public function load(ObjectManager $manager)
	{
		$categories = array(['Психология', 'psychology'], ['Философия', 'phylosophy'], ['Саморазвитие', 'growth'], ['Жиза', 'life']);

		$i = 1;
		foreach ($categories as $value) {
			$category = new Category();
			$category->setName($value[0]);
			$category->setSlug($value[1]);
			$manager->persist($category);
			
			$this->addReference('category_number'.$i, $category);
			$i++;
		}

		$manager->flush();
	}
}