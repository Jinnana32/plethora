<?php


/* Public routes */
Route::get('/', 'PublicController@showLandingPage');

/* Abode */
Route::get("/catalog", 'PublicController@showCatalog');
Route::get("/catalog/search/{category}/{location}/{developer}", "PublicController@showSearchCatalog");
Route::get("/developers", 'PublicController@showDevelopers');
Route::get("/{location_id}/developers", 'PublicController@showDevelopersByLocation');
Route::get('/abode', 'PublicController@showAbodes');
Route::get('/abode/{abode_id}', 'PublicController@showAbodeDetail');

/* Agent */
Route::get("/agent/find", 'PublicController@showFindAgents');
Route::get('/agent/{agent_name}', 'PublicController@showAgent');
Route::get('/agents', 'PublicController@showAgents');
Route::post('/agent/edit/info', 'AgentController@editInfo')->name("edit_info.submit");
Route::get('register', function(){ return view("public.pub_register"); })->name("register");
Route::get('/register/{agent_name}', 'PublicController@showAgentReferralLink');
Route::get('login', function(){ return view("landing.login"); })->name("login");
Route::post('login', 'AgentController@login')->name("login.submit");
Route::post('register', 'UserController@quickRegister')->name("register.submit");
Route::get('logout', 'UserController@logouts')->name('phradmin.logout');

/* Inbox */
Route::post('/inbox/message', 'InboxController@addInboxMessage')->name("inbox.message.submit");
Route::post('/inbox/inquire', 'InboxController@addInquireMessage')->name("inbox.inquiry.submit");

/* Login routes */
Route::group(['middleware' => ['guest'], 'prefix' => 'phradmin'], function() {
    Route::get('/login', 'UserController@showLogin')->name("phradmin.login");
    Route::post('/login', 'UserController@login')->name("phradmin.login.submit");
});

/* Admin routes */
Route::group(['middleware' => ['auth'], 'prefix' => 'phradmin'], function() {
    Route::get('/dashboard', 'AdminController@index')->name("phradmin.dashboard");

    /* Agent module */
    Route::get('/agents', 'AdminController@showAgents')->name("phradmin.agents`");
    Route::get('/pending_agents', 'AdminController@showPendingAgents');
    Route::get('/agents/create', function(){
        return view('admin.agents.agent_create');
    });
    Route::get('/pending_agents/assign/{user_id}', "AdminController@showAssignAgent");

    /* Abode module */
    Route::post('/abode/image/update', 'AbodeController@addAbodeImage')->name("phradmin.update_abode_image.submit");
    Route::post('/abode/pricing/update', 'AbodeController@updatePricing')->name("phradmin.update_abode_pricing.submit");
    Route::post('/abode/image/add', 'AbodeController@addAbode')->name("phradmin.add_abode_image.submit");
    Route::post('/abode/details/update', 'AbodeController@updateAbodeDetails')->name("phradmin.update_abode_details.submit");
    Route::get('/abode', 'AdminController@showAbode')->name("phradmin.abodes");
    Route::get('/abode/create', function(){
        return view('admin.abode.abode_create');
    });
    Route::get('/abode/{abode_id}/details', 'AbodeController@showAbodeDetails');
    Route::get('/abode/{abode_id}/details/remove/{image_id}/', 'DeveloperController@removeAbodeImage');

    Route::get("abode/filter/{category}/{location}/{developer}", "AdminController@filterAbodes");

    //Route::get('abode/features', 'AdminController@showFeatures');
    //Route::get('abode/category', 'AdminController@showCategory');

    /* Customized */

    // Developer Routes
    Route::get('customize/developers', 'DeveloperController@showDevelopers');
    Route::post('customize/developers/add', 'DeveloperController@addDeveloper')->name("phradmin.add_developer.submit");
    Route::post('customize/developers/update', 'DeveloperController@updateDeveloper')->name("phradmin.update_developer.submit");
    Route::get('customize/developers/remove/{dev_id}/{dev_name}', 'DeveloperController@removeDeveloper');
    Route::post('customize/developers/brand/add', 'DeveloperController@addBranding')->name("phradmin.add_branding.submit");
    Route::post('customize/developers/brand/update', 'DeveloperController@updateBranding')->name("phradmin.update_branding.submit");
    Route::get('customize/developers/brand/remove/{brand_id}/{brand_name}', 'DeveloperController@removeBranding');

    // Dashboard
    Route::post('dashboard/add', 'DeveloperController@addUser')->name("phradmin.add_user.submit");

    // Project Routes
    Route::get('customize/developer/{dev_id}/projects', 'ProjectController@showProjects');
    Route::get('customize/developer/{dev_id}/brand/{brand_id}/projects', 'ProjectController@showProjectsWithBrands');
    Route::post('customize/projects/add', 'ProjectController@addProject')->name("phradmin.add_project.submit");
    Route::post('customize/projects/update', 'ProjectController@updateProject')->name("phradmin.update_project.submit");
    Route::get('customize/developer/{dev_id}/projects/remove/{proj_id}/{proj_name}', 'ProjectController@removeProject');
    Route::get('customize/developer/{dev_id}/brand/{brand_id}/projects/remove/{proj_id}/{proj_name}', 'ProjectController@removeProject');

    // Category Routes
    Route::get('customize/category', 'CategoryController@showCategory');
    Route::post('customize/category/add', 'CategoryController@addCategory')->name("phradmin.add_category.submit");
    Route::post('customize/category/update', 'CategoryController@updateCategory')->name("phradmin.update_category.submit");
    Route::post('customize/category/feature/add', 'CategoryController@addCategoryFeature')->name("phradmin.add_category_feature.submit");
    Route::get('customize/category/feature/remove/{cat_id}/{feat_id}', 'CategoryController@removeCategoryFeature');
    Route::get('customize/category/remove/{cat_id}/{cat_name}', 'CategoryController@removeCategory');
    Route::post('customize/category/option/add', 'CategoryController@addOption')->name("phradmin.add_option.submit");
    Route::get('customize/category/option/remove/{opt_id}', 'CategoryController@removeOption')->name("phradmin.remove_option.submit");

    // Feature Routes
    Route::get('customize/feature', 'CategoryController@showFeatures');
    Route::post('customize/feature/add', 'CategoryController@addFeature')->name("phradmin.add_feature.submit");
    Route::get('customize/feature/remove/{feat_id}/{feat_name}', 'CategoryController@removeFeature');

    // Location Routes
    Route::get('customize/location', 'LocationController@showLocation');
    Route::post('customize/location/add', 'LocationController@addLocation')->name("phradmin.add_location.submit");
    Route::post('customize/location/update', 'LocationController@updateLocation')->name("phradmin.update_location.submit");
    Route::get('customize/location/remove/{loc_id}/{loc_name}', 'LocationController@removeLocation');

    // Tracks
    Route::get('track/compensation', 'CompensationController@showCompensation')->name("phradmin.compensation");
    Route::get('track/compensation/form/create', 'CompensationController@showCreateCompensation');
    Route::post('track/compensation/create', 'CompensationController@submitCreateCompensation')->name("phradmin.add_compensation.submit");

    Route::get('track/releasing/{com_id}', 'CompensationController@showReleasing');
    Route::post('track/releasing/create', 'CompensationController@addRelease')->name("phradmin.add_releasing.submit");


    Route::get('track/milestone', 'MilestoneController@showMilestones');
    Route::get('track/incentives', 'IncentiveController@showIncentives');

    Route::post('track/incentives/add', 'IncentiveController@addIncentive')->name("phradmin.add_incentive.submit");
    Route::post('track/incentives/update', 'IncentiveController@updateIncentive')->name("phradmin.update_incentive.submit");
    Route::get('track/incentives/remove/{incentive_id}/{description}', 'IncentiveController@removeIncentive');
    Route::get('track/logging', 'AdminController@showLogs');

    // Settings
    Route::get('settings/account', 'AdminController@showAccountSettings');
    Route::post('settings/update/username', 'AdminController@updateUsername')->name("phradmin.update_username.submit");
    Route::post('settings/update/password', 'AdminController@updatePassword')->name("phradmin.update_password.submit");
    Route::get('settings/website', 'AdminController@showWebsiteSettings');
    Route::post('settings/website/update', 'AdminController@updateWebsite')->name("phradmin.update_website_status.submit");

    /* Learnings */
    Route::get('learning/trainings', 'AdminController@showTrainings');
    Route::post('learning/trainings/add', 'TrainingController@addTraining')->name("phradmin.add_training.submit");

    Route::get('learning/webinars', 'AdminController@showWebinars');
    Route::post('learning/webinars/add', 'AdminController@addWebinar')->name("phradmin.add_webinar.submit");



});

/* Agent routes */
Route::group(['middleware' => ['agent_auth'], 'prefix' => 'agent'], function() {
    Route::get('/', 'AgentController@index')->name('agent');
    Route::get('/{agent_id}/listings', 'AgentController@listings')->name('listings');
    Route::get('/{agent_id}/progression', 'AgentController@progression')->name('progression');
    Route::get('/{agent_id}/learnings', 'AgentController@learnings')->name('learnings');
    Route::get('/{agent_id}/businesscard', 'AgentController@businessCard')->name('businesscard');
    Route::get('/{agent_id}/inbox', 'AgentController@inbox')->name('inbox');
    Route::get('/{agent_id}/faqs', 'AgentController@faqs')->name('faqs');
    Route::get('/{agent_id}/profile', 'AgentController@profile')->name('profile');
    Route::get('/{agent_id}/find_list', 'AgentController@findList')->name('findList');

    Route::get('/{abode_id}/tags/{username}', 'AgentController@tagAgent')->name('tagAgent');
    Route::get('/{abode_id}/untags/{username}', 'AgentController@untagAgent')->name('UntagAgent');

    Route::get('/{agent_id}/progression/genealogy', 'AgentController@genealogy')->name('genealogy');


    Route::post('/profile/image/update', 'AgentController@updateAgentImage')->name("phradmin.update_profile_image.submit");

});
