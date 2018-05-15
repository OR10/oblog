<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\DateTime;

class bPostFixtures extends Fixture
{
	public function load(ObjectManager $manager)
	{		
		$titles = array('Kot', 'Dog', 'Karl', 'Kolya', 'Carol', 'Swift', 'Man', 'Dirk', 'Sergey', 'Jonas', 'Sandy', 'Liza');
		$texts = array('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam at dictum ante. Nam blandit, est nec maximus dapibus, libero tellus pretium risus, sed finibus dui mauris eleifend est. Pellentesque tincidunt odio in mi consectetur, quis consectetur nunc blandit. Duis arcu sapien, auctor non luctus non, varius faucibus orci. Praesent ac nulla ac nulla porta commodo. Fusce aliquet sem id nibh condimentum, vel lobortis elit scelerisque. Maecenas in dolor fermentum, viverra arcu vel, scelerisque metus. Nullam ut dui ac urna suscipit gravida vitae sagittis nisi. Aenean porttitor risus quis varius fringilla. Morbi euismod mi in ligula sagittis, ac porta enim fermentum. Nulla dapibus a neque non luctus. Donec sollicitudin, arcu eget commodo commodo, orci enim cursus quam, vitae ornare dui sapien at sem. Duis tempus ligula a dui fermentum feugiat.

			Duis ac mattis odio. Ut lacinia magna ac justo venenatis, eu pellentesque magna laoreet. Sed a mi massa. Aliquam massa ante, auctor ut tellus ac, posuere commodo sapien. Sed tristique leo metus, et pulvinar leo sollicitudin sit amet. Vestibulum accumsan ipsum quis est egestas fermentum. Praesent leo augue, tempus vitae augue eu, rhoncus aliquet lorem. Suspendisse nec rutrum urna, ut consectetur lorem. Aenean lorem sem, ornare sed tempor sit amet, finibus id tellus.

			Morbi dapibus, massa ac iaculis commodo, tortor lacus blandit enim, a faucibus libero velit non sem. Proin enim metus, vestibulum in turpis vel, finibus varius libero. In sollicitudin ornare ultricies. Aliquam sed gravida lorem, in sollicitudin libero. Donec interdum felis fermentum, aliquam nulla quis, gravida mi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis eu nulla ac metus efficitur condimentum. In in feugiat orci, sed semper eros. Etiam lobortis elit eget velit tempor aliquam. Mauris rhoncus nulla id vehicula varius. Vivamus magna ligula, condimentum sed massa ut, malesuada rutrum libero.

			Sed in facilisis mi, vitae laoreet risus. Aenean vel diam augue. Nulla sit amet sem id tortor volutpat egestas nec sed elit. Donec sed dolor sagittis, semper neque ac, scelerisque odio. Morbi nec sem tellus. Duis est nulla, tincidunt eget lacus ac, tempor ornare risus. Quisque in iaculis turpis. Nulla lacinia, risus in sodales pharetra, libero ante tempus sapien, vitae scelerisque nisl neque vel nisi.

			Nunc id ex semper, vehicula tortor a, facilisis risus. Curabitur interdum felis massa. Aliquam bibendum nibh arcu, at vehicula erat convallis a. Aliquam vel venenatis nisl. Morbi non diam mollis, lacinia ipsum ut, iaculis nisl. Pellentesque vitae aliquet nisi. Sed volutpat augue id nunc aliquet facilisis. Mauris non nibh congue, rutrum dui vitae, aliquam est. Pellentesque vitae finibus metus. Maecenas turpis purus, dictum ut urna ac, sodales dignissim libero. Praesent venenatis facilisis consequat. Aenean non ipsum libero. Ut placerat condimentum mauris, sit amet blandit urna elementum at. Suspendisse dictum, quam ut ornare dapibus, libero nulla luctus nunc, sit amet pretium velit augue et enim. In ut vehicula urna. Ut at maximus nulla, a bibendum dui.');

		for ($i = 0; $i < 10; $i++) {	
			$randCategoryId = mt_rand(1, 4);
			$post = new Post();
			$post->setTitle($titles[array_rand($titles)].' '.$titles[array_rand($titles)].' '.$titles[array_rand($titles)].' '.$titles[array_rand($titles)]);
			$post->setSlug(str_replace(' ', '_', strtolower($post->getTitle())));
			$post->setText($texts[array_rand($texts)]);
			$post->setCategoryId($this->getReference('category_number'.$randCategoryId));
			$post->setCreatedDate(new \DateTime(date('Y-m-d')));
			$post->setUpdatedDate(new \DateTime(date('Y-m-d')));

			$manager->persist($post);			
		}

		$manager->flush();
	}
}