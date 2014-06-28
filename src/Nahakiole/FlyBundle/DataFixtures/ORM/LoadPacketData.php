<?php
// src/Acme/HelloBundle/DataFixtures/ORM/LoadUserData.php

namespace Acme\HelloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Expenses\ExpensesBundle\Entity\CompanyFunction;
use Expenses\ExpensesBundle\Entity\Role;
use Expenses\ExpensesBundle\Entity\Worker;
use Expenses\ExpensesBundle\Form\ExpenseType;
use Nahakiole\FlyBundle\Entity\Application;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData extends ContainerAware implements FixtureInterface
{

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $chrome = new Application();
        $chrome->setName('Google Chrome');
        $chrome->setDescription('This is a browser from Google based on the browser chromium');
        $chrome->setIcon('chrome.png');

        $opera = new Application();
        $opera->setName('Opera');
        $opera->setDescription('Opera is a web browser developed by Opera Software');
        $opera->setIcon('opera.png');

        $firefox = new Application();
        $firefox->setName('Firefox');
        $firefox->setDescription('Mozilla Firefox is a free Webbrowser from Mozilla-Projektes.');
        $firefox->setIcon('firefox.png');

        $firefox = new Application();
        $firefox->setName('Firefox');
        $firefox->setDescription('Mozilla Firefox is a free Webbrowser from Mozilla-Projektes.');
        $firefox->setIcon('firefox.png');

        $phpstorm  = new Application();
        $phpstorm->setName('PHPStorm');
        $phpstorm->setDescription('JetBrains PhpStorm is a commercial, cross-platform IDE for PHP');
        $phpstorm->setIcon('phpstorm.png');

        $vim  = new Application();
        $vim->setName('VIM');
        $vim->setDescription('Vim (Vi IMproved) ist eine Weiterentwicklung des Texteditors vi.');
        $vim->setIcon('vim.png');

        $filezilla  = new Application();
        $filezilla->setName('Filezilla');
        $filezilla->setDescription('FileZilla is free, cross-platform FTP application software, consisting of FileZilla Client and FileZilla Server.');
        $filezilla->setIcon('filezilla.png');

        $ack  = new Application();
        $ack->setName('Ack');
        $ack->setDescription('Ack is a tool like grep, optimized for programmers');
        $ack->setIcon('ack.png');

        $manager->persist($chrome);
        $manager->persist($opera);
        $manager->persist($firefox);
        $manager->persist($phpstorm);
        $manager->persist($vim);
        $manager->persist($filezilla);
        $manager->persist($ack);
        $manager->flush();
    }


}