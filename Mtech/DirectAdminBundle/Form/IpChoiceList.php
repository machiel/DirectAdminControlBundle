<?php
/**
 * Created by JetBrains PhpStorm.
 * User: machiel
 * Date: 6/12/13
 * Time: 8:44 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Mtech\DirectAdminBundle\Form;


use Symfony\Component\Form\Extension\Core\ChoiceList\LazyChoiceList;
use VanOns\DirectAdminApi\DirectAdmin;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;

class IpChoiceList extends LazyChoiceList {

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
        $ips = $this->directAdmin->getIps();

        $choices = array();
        $labels = array();

        foreach($ips as $ip) {
            $choices[] = $ip;
            $labels[] = $ip;
        }

        return new ChoiceList($choices, $labels);

    }


}