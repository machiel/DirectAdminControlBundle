<?php
/**
 * Created by JetBrains PhpStorm.
 * User: machiel
 * Date: 6/12/13
 * Time: 7:12 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Mtech\DirectAdmin\UserBundle\Form;

use Mtech\DirectAdminBundle\Form\IpChoiceList;
use Mtech\DirectAdminBundle\Form\PackageChoiceList;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType {

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'VanOns\DirectAdminApi\Models\User'
        ));

        $resolver->setRequired(array('directAdmin'));

        $resolver->setAllowedTypes(array(
            'directAdmin' => 'VanOns\DirectAdminApi\DirectAdmin'
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'direct_admin_user';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $directAdmin = $options['directAdmin'];

        $builder
            ->add('username', 'text', array('label' => 'user.username'))
            ->add('email', 'email', array('label' => 'user.email'))
            ->add('password', 'password', array('label' => 'user.password'))
            ->add('domain', 'text', array('label' => 'domain.name'))
            ->add('package', 'choice', array('label' => 'package.name', 'choice_list' => new PackageChoiceList($directAdmin)))
            ->add('ip', 'choice', array('label' => 'user.ip', 'choice_list' => new IpChoiceList($directAdmin)));
    }


}