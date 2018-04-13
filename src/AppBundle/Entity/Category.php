<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="Categories", options={"collate"="utf8_general_ci", "charset"="utf8"})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Column(name="category_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="category_name", type="string", length=100)
     */
    private $categoryName;

    public function getId()
    {
        return $this->id;
    }
     
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getCategoryName()
    {
        return $this->categoryName;
    }
     
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;
        return $this;
    }
}

