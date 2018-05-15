<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="Posts", options={"collate"="utf8_general_ci", "charset"="utf8"})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
 */
class Post
{
    /**
     * @ORM\Column(name="post_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="post_title", type="string", length=150, unique=true)
     */
    private $title;

    /**
     * @ORM\Column(name="post_text", type="text")
     */
    private $text;

    /**
     * Every post can have only one category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(name="post_category_id", referencedColumnName="category_id")
     */
    private $categoryId;

    /**
     * @ORM\Column(name="post_slug", type="string", length=150, unique=true)
     */
    private $slug;

    /**
     * @ORM\Column(name="created_date", type="date", length=30)
     */
    private $createdDate;

    /**
     * @ORM\Column(name="updated_date", type="date", length=30)
     */
    private $updatedDate;

    public function getId()
    {
        return $this->id;
    }
     
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }
     
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getText()
    {
        return $this->text;
    }
     
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }
     
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    public function getSlug()
    {
        return $this->slug;
    }
     
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }    

    public function getCreatedDate()
    {
        return $this->createdDate;
    }
     
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
        return $this;
    }

    public function getUpdatedDate()
    {
        return $this->updatedDate;
    }
     
    public function setUpdatedDate($updatedDate)
    {
        $this->updatedDate = $updatedDate;
        return $this;
    }
}
