<?php

namespace Nahakiole\FlyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Repository
 *
 * @Orm\Entity()
 */
class RepositoryPacket extends Packet
{


    /**
     * @var string
     *
     * @ORM\Column(name="Url", type="string", length=255, nullable=true)
     */
    private $url = '';


    /**
     * Set url
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    function getScript()
    {
        $base = file_get_contents(__DIR__.'/../Resources/public/script/packet.sh');
        return  str_replace('[[PACKET_NAME]]', $this->getName(), $base);
    }
}
