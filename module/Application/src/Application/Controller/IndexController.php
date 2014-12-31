<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Application index controller
 * Doesn't need to do anything too fancy, this is just a simple website (for now)
 *
 * @author Rob Caiger
 */
class IndexController extends AbstractActionController
{
    /**
     * Render a view based on the url
     *
     * @return ViewModel
     */
    public function indexAction()
    {

        $view = rtrim('page/' . $this->params('view'), '/');
        $resolver = $this->getServiceLocator()->get('Zend\View\Resolver\TemplatePathStack');

        if ($resolver->resolve($view) === false) {
            return $this->notFoundAction();
        }

        $content = new ViewModel();
        $content->setTemplate($view);

        return $content;
    }
}
