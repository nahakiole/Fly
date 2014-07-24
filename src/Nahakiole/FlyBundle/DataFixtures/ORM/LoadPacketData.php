<?php
// src/Acme/HelloBundle/DataFixtures/ORM/LoadUserData.php


namespace Nahakiole\FlyBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nahakiole\FlyBundle\Entity\Application;
use Nahakiole\FlyBundle\Entity\Distribution;
use Nahakiole\FlyBundle\Entity\Packet;
use Nahakiole\FlyBundle\Entity\Repository;
use Nahakiole\FlyBundle\Entity\RepositoryPacket;
use Symfony\Component\DependencyInjection\ContainerAware;

class LoadPacketData extends ContainerAware implements FixtureInterface
{

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        $firefox = new Application();
        $firefox->setName('Firefox');
        $firefox->setDescription('Mozilla Firefox is a free Webbrowser from Mozilla-Projektes.');
        $firefox->setIcon('firefox.png');

        $firefoxPacket = new Packet();
        $firefoxPacket->setName('firefox');
        $firefox->addPacket($firefoxPacket);

        $vim = new Application();
        $vim->setName('VIM');
        $vim->setDescription('Vim (Vi IMproved) ist eine Weiterentwicklung des Texteditors vi.');
        $vim->setIcon('vim.png');


        $vimPacket = new Packet();
        $vimPacket->setName('vim-gnome');
        $vim->addPacket($vimPacket);


        $filezilla = new Application();
        $filezilla->setName('Filezilla');
        $filezilla->setDescription('FileZilla is free, cross-platform FTP application software.');
        $filezilla->setIcon('filezilla.png');

        $filezillaPacket = new Packet();
        $filezillaPacket->setName('filezilla');
        $filezilla->addPacket($filezillaPacket);


        $ack = new Application();
        $ack->setName('Ack');
        $ack->setDescription('Ack is a tool like grep, optimized for programmers');
        $ack->setIcon('ack.png');

        $ackPacket = new Packet();
        $ackPacket->setName('ack-grep');
        $ack->addPacket($ackPacket);

        $distribution = new Distribution();
        $distribution->setName('Debian');
        $distribution->setPacketManager('apt-get');




        $manager->persist($distribution);
        $manager->persist($firefoxPacket);
        $manager->persist($firefox);
        $manager->persist($vimPacket);
        $manager->persist($vim);

        $manager->persist($filezillaPacket);
        $manager->persist($filezilla);

        $manager->persist($ackPacket);
        $manager->persist($ack);
        $manager->flush();
    }


}