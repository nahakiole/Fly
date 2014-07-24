<?php

namespace Nahakiole\FlyBundle\Form;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ApplicationType extends AbstractType
{

    /**
     * The entity manager
     *
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @param EntityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

     /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('icon');

        $builder->add('packets', 'collection',
            array(
                'type' => new PacketType($this->entityManager),
                'allow_add'    => true,
                'by_reference' => false,
                'allow_delete' => true,
            )
        );
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Nahakiole\FlyBundle\Entity\Application'
        ));
    }



    /**
     * @return string
     */
    public function getName()
    {
        return 'nahakiole_flybundle_application';
    }
}
