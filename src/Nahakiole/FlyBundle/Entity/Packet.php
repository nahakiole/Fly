<?php

namespace Nahakiole\FlyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Packet
 *
 * @ORM\Entity
 */
class Packet
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
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Application", inversedBy="packets")
     */
    private $application;

    /**
     * @ORM\ManyToOne(targetEntity="Distribution", inversedBy="packets")
     */
    private $distribution;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=255)
     */
    private $source;

    function __construct()
    {
        $this->source = 'packet.sh';
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
     * @return Packet
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
     * @return mixed
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * @param mixed $application
     */
    public function setApplication($application)
    {
        $this->application = $application;
    }



    /**
     * Set source
     *
     * @param string $source
     * @return Packet
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    function getScript()
    {
        return file_get_contents(dirname(__DIR__) .'/Resources/public/script/'.$this->source);
    }

    function setScript($script){
        file_put_contents(dirname(__DIR__) .'/Resources/public/script/'.$this->source,$script);
    }

    function renderScript(){
        return file_get_contents(dirname(__DIR__) .'/Resources/public/script/'.$this->source);
    }

    /**
     * @return mixed
     */
    public function getDistribution()
    {
        return $this->distribution;
    }

    /**
     * @param mixed $distribution
     */
    public function setDistribution($distribution)
    {
        $this->distribution = $distribution;
    }


}
