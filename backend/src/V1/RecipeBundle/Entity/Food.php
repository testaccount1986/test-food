<?php

namespace V1\RecipeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Food
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Food
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
     * @ORM\OneToOne(targetEntity="Recipe", mappedBy="food")
     */
    private $recipe;

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
     * @ORM\ManyToMany(targetEntity="Ingredient", inversedBy="food")
     * @ORM\JoinTable(name="food_ingredient",
     *           joinColumns={@ORM\JoinColumn(name="food_id", referencedColumnName="id")},
     *          inverseJoinColumns={@ORM\JoinColumn(name="ingredient_id", referencedColumnName="id")})
     */
    public $ingredient;
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
     * @return Food
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
     * @return Food
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
     * Set recipe
     *
     * @param string $recipe
     * @return Food
     */
    public function setRecipe($recipe)
    {
        $this->recipe = $recipe;

        return $this;
    }

    /**
     * Get recipe
     *
     * @return string 
     */
    public function getRecipe()
    {
        return $this->recipe;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Food
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
     * @return Food
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
