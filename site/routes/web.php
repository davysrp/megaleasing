<?php


/**
 * Global Routes
 * Routes that are used between both frontend and backend.
 */

Route::get('sendmail', function () {
    $data = array('name'=>"vikash Mirdha");
    $transport = (new Swift_SmtpTransport('smtp.office365.com', 587))
        ->setUsername('websupport@megaleasing.com.kh')
        ->setPassword('oN0@319&R')
        ->setEncryption('tls');

    /*$transport = (new Swift_SmtpTransport('smtp.office365.com', 587))
        ->setUsername('davysrp@outlook.com')
        ->setPassword('Ravy@@2022')
        ->setEncryption('tls');*/
    $transport=new Swift_SendmailTransport('/usr/sbin/sendmail -bs');
    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

// Create a message
    $message = (new Swift_Message('Wonderful Subject'))
        ->setFrom(['websupport@megaleasing.com.kh' => 'John Doe'])
        ->setTo(['davysrp@outlook.com', 'other@domain.org' => 'A name'])
        ->setBody(view('test'))
    ;

// Send the message
    $result = $mailer->send($message);
});


// Switch between the included languages
Route::get('lang/{lang}', 'LanguageController@swap');

/* ----------------------------------------------------------------------- */

/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/Frontend/');
});

/* ----------------------------------------------------------------------- */

/*
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */
    includeRouteFiles(__DIR__.'/Backend/');


});


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
/*
* Routes From Module Generator
*/
includeRouteFiles(__DIR__.'/Generator/');