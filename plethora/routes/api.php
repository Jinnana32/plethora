<?php

use Illuminate\Http\Request;

/*
    API NOTES:
==========================================================================================

    Use swagger specification to create endpoints.

    eg. Article                Method    |     Verb     |         Convention
    Creating Article           STORE           POST               ArticleController@store
    Updating Article           UPDATE          PUT                ArticleController@update
    Deleting Article           DELETE          DELETE             ArticleController@delete
    Showing all Article        INDEX           GET                ArticleController@index
    Show Article ID            SHOW            GET                ArticleController@show

===========================================================================================
*/


/* User Authentication & Management */
Route::group(['prefix' => '/v1'], function() {
    Route::post('login',  'UserController@login');
    Route::post('register', 'UserController@register');
});

Route::get("time", "UserController@time");

Route::post("timein", "InboxController@timeIn");
Route::put("timeout", "InboxController@timeOut");
Route::get("hasTimeIn", "InboxController@hasTimeIn");
Route::post('login',  'InboxController@login');

/*
*  Prefix: /admin
*  https://www.realestate.com/api/v1/admin/[API_ROUTE]
*  This API block is consume by admin side
*  Note: Every API calls inside this block is authenticated.
*/

/* Compensation */


Route::group(['prefix' => '/v1/admin'], function() {

    /* Training */
    Route::post('training', 'TrainingController@store');
    Route::put('training/{training}', 'TrainingController@update');
    Route::delete('training/{training}', 'TrainingController@delete');
    Route::get('training', 'TrainingController@index');
    Route::get('training/{id}', 'TrainingController@show');

    /* Webinars */
    Route::post('webinar', 'WebinarController@store');
    Route::put('webinar/{webinar}', 'WebinarController@update');
    Route::delete('webinar/{webinar}', 'WebinarController@delete');
    Route::get('webinar', 'WebinarController@index');
    Route::get('webinar/{webinar}', 'WebinarController@show');

    /* Abode */
    Route::post('abode', 'AbodeController@store');
    Route::put('abode/{abode}', 'AbodeController@update');
    Route::delete('abode/{abode}', 'AbodeController@delete');
    Route::get('abode', 'AbodeController@index');
    Route::get('abode/{abode}', 'AbodeController@show');

    /* Incentive */
    Route::post('incentive', 'IncentiveController@store');
    Route::put('incentive/{incentive}', 'IncentiveController@update');
    Route::delete('incentive/{incentive}', 'IncentiveController@delete');
    Route::get('incentive', 'IncentiveController@index');
    Route::get('incentive/{incentive}', 'IncentiveController@show');

     /* Helpers */
     Route::get('developers', 'GenericController@index');
     Route::get('category', 'GenericController@category');
     Route::get('category/options/{category_id}', 'GenericController@categoryOptions');
     Route::get('agents', 'GenericController@agents');
     Route::get('location', 'GenericController@locations');
     Route::get('projects/{dev_id}/{brand_id}', 'GenericController@projects');

     /* Verify Users */
     Route::post('approveOrDecline', 'UserController@approveOrDecline');


     /* Utils */
     Route::get("search/agents", "GenericController@searchAgent");
     Route::get("search/abodes", "GenericController@searchAbodeModel");
     Route::get("breakdown/list", "GenericController@getCompensationBreakdown");
     Route::get("releasing/{com_id}", "GenericController@getReleasing");
     Route::get("breakdown/milestone/list", "GenericController@getCompesationMilestoneBreakdown");
     Route::post('compensation', 'CompensationController@store');

     Route::get("abode/details/{abode_id}", "GenericController@getAbodeDetails");

     Route::get("geneology/{agent_id}/list", "GenericCOntroller@getGeneology");

});

/*
*  https://www.realestate.com/api/v1/agent/[API_ROUTE]
*  Prefix: /agent
*  This API block is consume by agent side
*  Note: Every API calls inside this block is authenticated.
*/

Route::group(['prefix' => '/v1/agent'], function() {

    /* Registrationn */
    Route::get('registration/{registration}');

    /* Account */

    /* Listings */
    Route::get('listings', 'AbodeController@index');
    Route::get('listings/{listings}', 'AbodeController@show');

    /* Inbox */
    Route::get('inbox', 'InboxController@index');
    Route::get('inbox/{inbox}', 'InboxController@show');

    /* E-Business Card */
    Route::get('ebusinesscard', 'PersonalInformationController@index');
    Route::get('ebusinesscard/{ebusinesscard}', 'PersonalInformationController@show');

    /* Genealogy */
    Route::get('genealogy', 'GenealogyController@index');
    Route::get('genealogy/{genealogy}', 'GenealogyController@show');
    Route::get('genealogy/position/{pos}', 'GenealogyController@getAgentPosition');

    /* Compensation */
    Route::get('compensation', 'CompensationController@index');
    Route::get('compensation/{compensation}', 'CompensationController@show');

    /* Milestone */
    Route::get('milestone', 'MilestoneController@index');
    Route::get('milestone/{milestone}', 'MilestoneController@show');

    /* Incentives */
    Route::get('incentives', 'IncentiveController@index');
    Route::get('incentives/{incentives}', 'IncentiveController@show');

    /* Trainings */
    Route::get('training', 'TrainingController@index');
    Route::get('training/{training}', 'TrainingController@show');

    /* Webinars */
    Route::get('webinar', 'WebinarController@index');
    Route::get('webinar/{webinar}', 'WebinarController@show');

});

/*
*  Prefix: /
*  This API block is consume by public side
*  Note: Every API calls inside this block is authenticated.
*/

Route::group(['middleware' => ['jwt.verify'], 'prefix' => '/v1'], function() {

    /* Find Abode */
    Route::get('abode/{abode}', 'AbodeController@show');

    /* Buy */
    Route::get('buy/{abode}', 'AbodeController@show');

    /* Sell */
    Route::get('sell/{abode}', 'AbodeController@show');

    /* Assume */
    Route::get('assume/{abode}', 'AbodeController@show');

    /* Gallery */
    Route::get('gallery', 'GalleryController@index');

    /* Events */
    Route::get('events', 'EventController@index');

    /* Blog */
    Route::get('blog', 'BlogController@index');

    /* Find an Agent */
    Route::get('find', 'PersonalInformationController@index');
    Route::get('find{personalInformation}', 'PersonalInformationController@show');

});
