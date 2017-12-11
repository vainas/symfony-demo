<?php

namespace BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entries
 */
class Entries
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $image;

    /**
     * @var \BlogBundle\Entity\Users
     */
    private $user;

    /**
     * @var \BlogBundle\Entity\Categories
     */
    private $category;

    /**
     * @var \BlogBundle\Entity\EntryTag
     */
    private $entryTag;

    public function __construct()
    {
        $this->entryTag = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Entries
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Entries
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Entries
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Entries
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set user
     *
     * @param \BlogBundle\Entity\Users $user
     *
     * @return Entries
     */
    public function setUser(\BlogBundle\Entity\Users $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \BlogBundle\Entity\Users
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set category
     *
     * @param \BlogBundle\Entity\Categories $category
     *
     * @return Entries
     */
    public function setCategory(\BlogBundle\Entity\Categories $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \BlogBundle\Entity\Categories
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Get entryTag
     *
     * @return ArrayCollection
     */
    public function getEntryTag()
    {
        return $this->entryTag;
    }
}

