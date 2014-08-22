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


/******************************************************************************
 * Define action functions. Each should just return a string of the content for
 * given page, or it can redirect the user elsewhere if processing a form, for
 * example.
 ******************************************************************************/




function actionNewsLetter(){

}
