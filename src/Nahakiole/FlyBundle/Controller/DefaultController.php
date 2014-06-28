<?php

namespace Nahakiole\FlyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    private $adjectives = ['adorable', 'hilarious', 'famous', 'gracious', 'golden', 'gray', 'yellow', 'pink', 'blue', 'red', 'green', 'dreadful', 'striking', 'orange', 'charming', 'wild', 'purple', 'glorious', 'sparkling', 'Fast', 'Quick', 'Speedy', 'Swift', 'Hasty', 'Zippy', 'Rapid', 'Slow', 'Sluggish', 'Creeping', 'Dawdling', 'Meandering', 'Crawling', 'Beautiful', 'Striking', 'Stunning', 'Gorgeous', 'Picturesque', 'Lovely', 'Charming', 'Enchanting', 'Exquisite', 'Delicate', 'Ugly', 'Hideous', 'Horrid', 'Dreadful', 'Obnoxious', 'Nasty', 'Ghastly', 'Cruel', 'Revolting', 'Intimidating', 'Menacing', 'Miserable', 'Dangerous', 'Rude', 'Spoiled', 'Wild', 'Lazy', 'Selfish', 'Delinquent', 'Greedy', 'Vile', 'Ridiculous', 'Kind', 'Gentle', 'Quiet', 'Caring', 'Fair', 'Compassionate', 'Benevolent', 'Polite', 'Amusing', 'Generous', 'Entertaining', 'Hopeful', 'Lively', 'Creative', 'Brave', 'Good', 'Fantastic', 'Marvelous', 'Fabulous', 'Splendid', 'Brilliant', 'Superb', 'Dynamite', 'Bad', 'Dreadful', 'Terrible', 'Ghastly', 'Filthy', 'Repulsive', 'Awful', 'Happy', 'Joyful', 'Ecstatic', 'Cheerful', 'Delighted', 'Blithe', 'Carefree', 'Bored', 'Hardworking', 'Mysterious', 'Verbose', 'Laconic', 'Curious', 'Bucolic', 'Silly', 'Contrary', 'Shocking', 'Wild', 'Rambunctious', 'Courageous', 'Cowardly', 'Ornery', 'Gullible', 'Thrifty', 'Famous', 'Infamous', 'Brazen', 'Cold', 'Hard', 'Subtle', 'Gullible', 'Hungry', 'Anxious', 'Nervous', 'Antsy', 'Impatient', 'Shining', 'Crispy', 'Soaring', 'Endless', 'Sparkling', 'Fluttering', 'Spiky', 'Scrumptious', 'Eternal', 'Slimy', 'Slick', 'Gilded', 'Ancient', 'Smelly', 'Glowing', 'Rotten', 'Decrepit', 'Lousy', 'Grimy', 'Rusty', 'Sloppy', 'Muffled', 'Foul', 'Rancid', 'Fetid', 'Small', 'Itty-bitty', 'Tiny', 'Puny', 'Miniscule', 'Minute', 'Diminutive', 'Petite', 'Slight', 'Big', 'Huge', 'Gigantic', 'Monstrous', 'Immense', 'Great', 'Tremendous', 'Enormous', 'Massive', 'Whopping', 'Vast', 'Brawny', 'Hulking', 'Bulky', 'Towering', 'Hot', 'Steaming', 'Sweltering', 'Scorching', 'Blistering', 'Sizzling', 'Muggy', 'Stifling', 'Sultry', 'Oppressive', 'Cold', 'Chilly', 'Freezing', 'Icy', 'Frosty', 'Bitter', 'Arctic', 'Difficult', 'Demanding', 'Trying', 'Challenging', 'Easy', 'Simple', 'Effortless', 'Relaxed', 'Calm', 'Tranquil', 'Heavy', 'Serious', 'Grave', 'Profound', 'Intense', 'Severe'];

    private $objects = ['pirate', 'chocolate', 'pegasus', 'unicorn', 'shark', 'ninja', 'zombie', 'sun', 'glass', 'dream', 'day', 'army', 'song', 'cow', 'power', 'library', 'product', 'area', 'society', 'theory', 'party', 'Crime', 'Cupcake', 'Oxygen', 'Push', 'Room', 'Slip', 'Swan', 'Word', 'Writer', 'Baker', 'Coil', 'Company', 'Garlic', 'Makeup', 'Mary', 'Sycamore', 'Twine', 'Wrecker', 'Age', 'Attic', 'Baseball', 'Bed', 'Cupcake', 'Policeman', 'Retailer', 'Tom-tom ', 'Ton'];

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('\Nahakiole\FlyBundle\Entity\Application');
        $applications = $repository->findAll();
        return $this->render('FlyBundle:Default:packages.html.twig', ['applications' => $applications]);
    }

    public function aboutAction()
    {
        return $this->render('FlyBundle:Default:about.html.twig');
    }


    public function faqAction()
    {
        return $this->render('FlyBundle:Default:faq.html.twig');
    }

    public function downloadAction()
    {
        $rawApplications = $this->get('request')->request->get('applications');
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('\Nahakiole\FlyBundle\Entity\Application');

        $applicationsToInstall = $applications = [];
        if (is_array($rawApplications)) {
            foreach ($rawApplications as $id => $value) {
                if ($value == 'on') {
                    $applicationsToInstall[] = $id;
                }
            }
        } else {
            return new RedirectResponse($this->generateUrl('fly_homepage'));
        }
        $applications = $repository->findById($applicationsToInstall);
        return $this->render('FlyBundle:Default:download.html.twig', ['applications' => $applications, 'packageName' => $this->createPackageName()]);
    }

    public function packageAction($Package)
    {
        return new Response('Content', Response::HTTP_OK, array('content-type' => 'application/octet-stream')); // the headers public attribute is a ResponseHeaderBagreturn $response;
    }

    /**
     * @param Array $applicationId Array with the ids of the packages
     * @return string Package name
     */
    private function createPackage($applicationId)
    {


    }

    private function createPackageName()
    {
        $adjective = array_rand($this->adjectives);
        $secondAdjective = array_rand($this->adjectives);
        while ($secondAdjective == $adjective) {
            $secondAdjective = array_rand($this->adjectives);
        }
        $object = array_rand($this->objects);
        $secondObject = array_rand($this->objects);
        while ($object == $secondObject) {
            $secondObject = array_rand($this->objects);
        }
        return ucfirst($this->adjectives[$adjective]) . ucfirst($this->adjectives[$secondAdjective]) . ucfirst($this->objects[$object]) . ucfirst($this->objects[$secondObject]);
    }
}
