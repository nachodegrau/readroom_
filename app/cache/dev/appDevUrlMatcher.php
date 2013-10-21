<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/categor')) {
            // category_show
            if ($pathinfo === '/categories') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_category_show;
                }

                return array (  '_controller' => 'Readroom\\CategoriesBundle\\Controller\\CategoriesController::showCategoriesAction',  '_route' => 'category_show',);
            }
            not_category_show:

            if (0 === strpos($pathinfo, '/category')) {
                // category_save
                if ($pathinfo === '/category') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_category_save;
                    }

                    return array (  '_controller' => 'Readroom\\CategoriesBundle\\Controller\\CategoriesController::addCategoryAction',  '_route' => 'category_save',);
                }
                not_category_save:

                // category_update
                if ($pathinfo === '/category') {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_category_update;
                    }

                    return array (  '_controller' => 'Readroom\\CategoriesBundle\\Controller\\CategoriesController::updateCategoryAction',  '_route' => 'category_update',);
                }
                not_category_update:

                // category_delete
                if ($pathinfo === '/category') {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_category_delete;
                    }

                    return array (  '_controller' => 'Readroom\\CategoriesBundle\\Controller\\CategoriesController::deleteCategoryAction',  '_route' => 'category_delete',);
                }
                not_category_delete:

            }

        }

        // user_show
        if ($pathinfo === '/user') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_user_show;
            }

            return array (  '_controller' => 'Readroom\\UserBundle\\Controller\\UserController::showUserAction',  '_route' => 'user_show',);
        }
        not_user_show:

        // user_facebook_login
        if ($pathinfo === '/facebookuser') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_user_facebook_login;
            }

            return array (  '_controller' => 'Readroom\\UserBundle\\Controller\\UserController::loginFacebookAction',  '_route' => 'user_facebook_login',);
        }
        not_user_facebook_login:

        if (0 === strpos($pathinfo, '/user')) {
            // user_save
            if ($pathinfo === '/user') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_user_save;
                }

                return array (  '_controller' => 'Readroom\\UserBundle\\Controller\\UserController::addUserAction',  '_route' => 'user_save',);
            }
            not_user_save:

            // user_update
            if ($pathinfo === '/user') {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_user_update;
                }

                return array (  '_controller' => 'Readroom\\UserBundle\\Controller\\UserController::updateUserAction',  '_route' => 'user_update',);
            }
            not_user_update:

            // image_update
            if ($pathinfo === '/userimage') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_image_update;
                }

                return array (  '_controller' => 'Readroom\\UserBundle\\Controller\\UserController::chageUserImageAction',  '_route' => 'image_update',);
            }
            not_image_update:

            // user_delete
            if ($pathinfo === '/user') {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_user_delete;
                }

                return array (  '_controller' => 'Readroom\\UserBundle\\Controller\\UserController::deleteUserAction',  '_route' => 'user_delete',);
            }
            not_user_delete:

            // users_show
            if ($pathinfo === '/users') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_users_show;
                }

                return array (  '_controller' => 'Readroom\\UserBundle\\Controller\\UserController::showBooksAction',  '_route' => 'users_show',);
            }
            not_users_show:

            if (0 === strpos($pathinfo, '/user_has_books')) {
                // user_has_books_show
                if ($pathinfo === '/user_has_books') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_user_has_books_show;
                    }

                    return array (  '_controller' => 'Readroom\\UserBundle\\Controller\\UserHasBooksController::showUserHasBooksAction',  '_route' => 'user_has_books_show',);
                }
                not_user_has_books_show:

                // user_has_books_save
                if ($pathinfo === '/user_has_books') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_user_has_books_save;
                    }

                    return array (  '_controller' => 'Readroom\\UserBundle\\Controller\\UserHasBooksController::saveUserHasBooksAction',  '_route' => 'user_has_books_save',);
                }
                not_user_has_books_save:

                // user_has_books_update
                if ($pathinfo === '/user_has_books') {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_user_has_books_update;
                    }

                    return array (  '_controller' => 'Readroom\\UserBundle\\Controller\\UserHasBooksController::updateUserHasBooksAction',  '_route' => 'user_has_books_update',);
                }
                not_user_has_books_update:

                // user_has_books_delete
                if ($pathinfo === '/user_has_books') {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_user_has_books_delete;
                    }

                    return array (  '_controller' => 'Readroom\\UserBundle\\Controller\\UserHasBooksController::deleteUserHasBooksAction',  '_route' => 'user_has_books_delete',);
                }
                not_user_has_books_delete:

            }

        }

        if (0 === strpos($pathinfo, '/input')) {
            // input_show
            if ($pathinfo === '/input') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_input_show;
                }

                return array (  '_controller' => 'Readroom\\InputBundle\\Controller\\InputController::showInputAction',  '_route' => 'input_show',);
            }
            not_input_show:

            // input_save
            if ($pathinfo === '/input') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_input_save;
                }

                return array (  '_controller' => 'Readroom\\InputBundle\\Controller\\InputController::addInputAction',  '_route' => 'input_save',);
            }
            not_input_save:

            // input_update
            if ($pathinfo === '/input') {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_input_update;
                }

                return array (  '_controller' => 'Readroom\\InputBundle\\Controller\\InputController::updateInputAction',  '_route' => 'input_update',);
            }
            not_input_update:

            // input_delete
            if ($pathinfo === '/input') {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_input_delete;
                }

                return array (  '_controller' => 'Readroom\\InputBundle\\Controller\\InputController::deleteInputAction',  '_route' => 'input_delete',);
            }
            not_input_delete:

            // inputs_show
            if ($pathinfo === '/inputs') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_inputs_show;
                }

                return array (  '_controller' => 'Readroom\\InputBundle\\Controller\\InputController::showInputsAction',  '_route' => 'inputs_show',);
            }
            not_inputs_show:

        }

        if (0 === strpos($pathinfo, '/repl')) {
            // reply_save
            if ($pathinfo === '/reply') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_reply_save;
                }

                return array (  '_controller' => 'Readroom\\InputBundle\\Controller\\ReplyController::addReplyAction',  '_route' => 'reply_save',);
            }
            not_reply_save:

            // replies_show
            if ($pathinfo === '/replies') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_replies_show;
                }

                return array (  '_controller' => 'Readroom\\InputBundle\\Controller\\ReplyController::showRepliesAction',  '_route' => 'replies_show',);
            }
            not_replies_show:

        }

        // readroom_db_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'readroom_db_homepage')), array (  '_controller' => 'Readroom\\DBBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/book')) {
            // book_show
            if ($pathinfo === '/book') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_book_show;
                }

                return array (  '_controller' => 'Readroom\\BooksBundle\\Controller\\BooksController::showBookAction',  '_route' => 'book_show',);
            }
            not_book_show:

            // book_save
            if ($pathinfo === '/book') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_book_save;
                }

                return array (  '_controller' => 'Readroom\\BooksBundle\\Controller\\BooksController::addBookAction',  '_route' => 'book_save',);
            }
            not_book_save:

            // book_update
            if ($pathinfo === '/book') {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_book_update;
                }

                return array (  '_controller' => 'Readroom\\BooksBundle\\Controller\\BooksController::updateBookAction',  '_route' => 'book_update',);
            }
            not_book_update:

            // book_delete
            if ($pathinfo === '/book') {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_book_delete;
                }

                return array (  '_controller' => 'Readroom\\BooksBundle\\Controller\\BooksController::deleteBookAction',  '_route' => 'book_delete',);
            }
            not_book_delete:

            // books_show
            if ($pathinfo === '/books') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_books_show;
                }

                return array (  '_controller' => 'Readroom\\BooksBundle\\Controller\\BooksController::showBooksAction',  '_route' => 'books_show',);
            }
            not_books_show:

        }

        // readroom_home_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'readroom_home_homepage');
            }

            return array (  '_controller' => 'Readroom\\HomeBundle\\Controller\\DefaultController::indexAction',  '_route' => 'readroom_home_homepage',);
        }

        if (0 === strpos($pathinfo, '/demo')) {
            if (0 === strpos($pathinfo, '/demo/secured')) {
                if (0 === strpos($pathinfo, '/demo/secured/log')) {
                    if (0 === strpos($pathinfo, '/demo/secured/login')) {
                        // _demo_login
                        if ($pathinfo === '/demo/secured/login') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                        }

                        // _security_check
                        if ($pathinfo === '/demo/secured/login_check') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_security_check',);
                        }

                    }

                    // _demo_logout
                    if ($pathinfo === '/demo/secured/logout') {
                        return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
                    }

                }

                if (0 === strpos($pathinfo, '/demo/secured/hello')) {
                    // acme_demo_secured_hello
                    if ($pathinfo === '/demo/secured/hello') {
                        return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
                    }

                    // _demo_secured_hello
                    if (preg_match('#^/demo/secured/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',));
                    }

                    // _demo_secured_hello_admin
                    if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello_admin')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',));
                    }

                }

            }

            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
