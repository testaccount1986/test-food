<?php

namespace V1\RecipeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recipe
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Recipe
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="shortName", type="string", length=255, nullable=true)
     */
    private $shortName;

    /**
     * @var string
     *
     * @ORM\Column(name="cookingTime", type="string", length=255)
     */
    private $cookingTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetime", nullable=true)
     */
    private $modified;

   /**
    * @ORM\OneToOne(targetEntity="Food", inversedBy="recipe")
    * @ORM\JoinColumn(name="food_id", referencedColumnName="id")
    */
    public $food;

    /**
     * @ORM\OneToMany(targetEntity="Star", mappedBy="recipe")
     */
    public $stars;

    /**
     * @ORM\PrePersist
     */
    public function initCreate()
    {
       $this->setCreated(new \DateTime()); 
    }

    /**
     * @ORM\PreUpdate()
     * @ORM\PrePersist()
     */
    public function refreshUpdated() {
        $this->setModified(new \DateTime());
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
     * Set name
     *
     * @param string $name
     * @return Recipe
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set shortName
     *
     * @param string $shortName
     * @return Recipe
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;

        return $this;
    }

    /**
     * Get shortName
     *
     * @return string 
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * Set cookingTime
     *
     * @param string $cookingTime
     * @return Recipe
     */
    public function setCookingTime($cookingTime)
    {
        $this->cookingTime = $cookingTime;

        return $this;
    }

    /**
     * Get cookingTime
     *
     * @return string 
     */
    public function getCookingTime()
    {
        return $this->cookingTime;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Recipe
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     * @return Recipe
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime 
     */
    public function getModified()
    {
        return $this->modified;
    }
}
