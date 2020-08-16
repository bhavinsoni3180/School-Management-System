<?php

namespace Admin\LoginBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TblTeacherType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		->add('biuserroleid')
		->add('vusername')
	//	->add('vpassword')
		->add('vfirstname')
		->add('vlastname')
		->add('vemail')
		->add('vphone')
	//	->add('vuid')
	//	->add('estatus')
	//	->add('edelete')
	//	->add('icreatedby')
		->add('dcreateddate');
	//	->add('tmodifydate')
	//	->add('ideletedby');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Admin\LoginBundle\Entity\TblTeacher'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'admin_loginbundle_tblteacher';
    }


}
