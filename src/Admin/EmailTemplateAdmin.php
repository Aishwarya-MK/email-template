<?php
/**
 * Created by PhpStorm.
 * User: techjini
 * Date: 22-06-2020
 * Time: 21:37
 */

namespace App\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class EmailTemplateAdmin extends AbstractAdmin
{
    public $supportsPreviewMode = true;

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', TextType::class,
                array("label"=>"Template Name", 'attr' => ['maxlength' => 30, 'style' => 'width:50%']))
            ->add('senderName', TextType::class,
                array("label"=>"Sender Name", "required"=>false, 'attr' => ['maxlength' => 100, 'style' => 'width: 75%']))
            ->add('sendEmail', TextType::class,
                array("label"=>"Sender Email", "required"=>false, 'attr' => ['maxlength' => 150, 'style' => 'width:75%']))
            ->add('recipientEmail', TextType::class,
                array("label"=>"Recipient Email", "required"=>false, 'attr' => ['maxlength' => 255, 'style' => 'width:75%']))
            ->add('replayTo', TextType::class,
                array("label"=>"Replay T0","required"=>false, 'attr' => ['maxlength' => 255, 'style' => 'width:75%']))
            ->add('cc', TextType::class,
                array("label"=>"CC","required"=>false, 'attr' => ['maxlength' => 255, 'style' => 'width:75%']))
            ->add('bcc', TextType::class,
                array("label"=>"BCC","required"=>false, 'attr' => ['maxlength' => 255, 'style' => 'width:75%']))
            ->add('subject', TextType::class,
                array("label"=>"Email Subject","required"=>false, 'attr' => ['maxlength' => 255]))
            ->add('comments', TextType::class,
                array("label"=>"Comments","required"=>false, 'attr' => ['maxlength' => 255]))
            ->add('content', TextareaType::class,
                array("label"=>"Email Body", "required"=>false, 'attr' => ['class' => 'tinymce emailBody','placeholder'=> 'HTML format']))
            ->add('status', CheckboxType::class,
                array("label"=>"Enable","required"=>false,'attr' => ['style' => 'margin-left: 55px;']))
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name')
                    ->add('subject')
                    ->add('status');

    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');
        $listMapper->addIdentifier('subject');
        $listMapper->addIdentifier('status');
    }

    //removed delete functionalities from the admin panel
    protected function configureRoutes(RouteCollection $collection): void
    {
        $collection->remove('delete');
    }


}