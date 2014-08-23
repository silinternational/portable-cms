<?php

/**
 * Get the requested action, otherwise render index.
 */
$action = Utils::getParam('action', 'index');

/**
 * Poor man's router :-)
 */
switch($action){
    case 'index':
        $body = actionIndex();
        break;
    case 'newsletter':
        $body = actionNewsletter();
        break;
    default:
        $body = actionIndex();
        break;
}

/**
 * Render the page using the standard layout and the body content provided by
 * the action.
 */
renderPage($body);

function renderPage($body)
{
    ob_start();
    include __DIR__.'/partials/layout.php';
    $page = ob_get_clean();
    echo $page;
}


/******************************************************************************
 * Define action functions. Each should just return a string of the content for
 * given page, or it can redirect the user elsewhere if processing a form, for
 * example.
 ******************************************************************************/

/**
 * Default action
 */
function actionIndex()
{
    ob_start();
    include __DIR__.'/partials/index.php';
    $body = ob_get_clean();
    renderPage($body);
}

/**
 * Newsletter action renders newsletter signup form and handles form submissions
 */
function actionNewsLetter(){
    ob_start();
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        include __DIR__.'/partials/newsletter.php';
    } elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = Utils::getParam('name','');
        $email = Utils::getParam('email', '');
        $phone = Utils::getParam('phone','');
        $address = Utils::getParam('address','');
        $data = array($name, $email, $phone, $address);
        $fh = fopen(__DIR__.'/../newsletter.csv','a+');
        $fp = fputcsv($fh, $data);
        fclose($fh);
        if($fp){
            include __DIR__.'/partials/newsletter_success.php';
        } else {
            include __DIR__.'/partials/newsletter_failure.php';
        }
    }
    return ob_get_clean();
}
