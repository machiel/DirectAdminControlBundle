<?php
/**
 * Created by JetBrains PhpStorm.
 * User: machiel
 * Date: 6/12/13
 * Time: 8:12 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Mtech\DirectAdminBundle\Form;


use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\ChoiceList\LazyChoiceList;
use VanOns\DirectAdminApi\DirectAdmin;

class PackageChoiceList extends LazyChoiceList {

    /**
     * @var DirectAdmin
     */
    private $directAdmin;

    public function __construct(DirectAdmin $directAdmin) {
        $this->directAdmin = $directAdmin;
    }

    /**
     * Loads the choice list
     *
     * Should be implemented by child classes.
     *
     * @return ChoiceListInterface The loaded choice list
     */
    protected function loadChoiceList()
    {
        $packages = $this->directAdmin->getUserPackages();

        $choices = array();
        $labels = array();

        foreach($packages as $package) {
            $choices[] = $package;
            $labels[] = $package->getName();
        }

        return new ChoiceList($choices, $labels);

    }


}