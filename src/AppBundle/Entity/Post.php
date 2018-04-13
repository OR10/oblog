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
     * @ORM\Column(name="post_title", type="string", length=150)
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
     * @ORM\Column(name="posted_date", type="date", length=30)
     */
    private $postedDate;

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

    public function getPostedDate()
    {
        return $this->postedDate;
    }
     
    public function setPostedDate($postedDate)
    {
        $this->postedDate = $postedDate;
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
