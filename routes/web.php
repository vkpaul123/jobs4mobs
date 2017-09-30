<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Testing for welcome.blade.php
Route::get('/welcome', function() {
	return view('welcome');
});

//	Testing for Profile Registration

// Route::get('s3-image-upload','S3ImageController@imageUpload');
// Route::post('s3-image-upload','S3ImageController@imageUploadPost');

/*
	
	DEPLOYMENT

*/


Auth::routes();


//	Welcome Page for JobSeeker
Route::get('/', 'WelcomePageController@index');
Route::get('about', 'WelcomePageController@about');
Route::get('contact', 'WelcomePageController@contact');

//	Welcome Page for Employer
Route::prefix('employer')->group(function() {
	Route::get('/', 'WelcomePageEmployerController@index');
	Route::get('about', 'WelcomePageEmployerController@about');
	Route::get('contact', 'WelcomePageEmployerController@contact');
});

Route::post('contactAdmin', 'UserMessageSendController@sendMessage')->name('allUsers.sendMessage');
Route::get('verifyEmailFirst','UserMessageSendController@verifyEmailFirst')->name('verifyEmailFirst');
Route::get('verifyEmailFirst/invalid','UserMessageSendController@invalidToken')->name('invalidToken');
Route::get('verify/{email}/{verifyToken}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone.user');
Route::get('verifyEmployer/{email}/{verifyToken}', 'Employer\Auth\RegisterController@sendEmailDone')->name('sendEmailDone.employer');

// Admin Routes
Route::group(['namespace' => 'Admin'], function() {
	Route::prefix('admin')->group(function() {
		Route::get('/', 'PageController@index')->name('admin.home');
		
		//	Auth
		Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
		Route::post('login', 'Auth\LoginController@login');
		Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
		Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');
		Route::post('register', 'Auth\RegisterController@register');
		Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
		Route::post('password/reset', 'Auth\ResetPasswordController@reset');
		Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
		Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

		//	Add Admin
		Route::get('addAdmin', 'PageController@addAdmin');
		Route::get('editAdmin', 'PageController@editAdmin');
		Route::get('viewAdmins', 'PageController@viewAdmins');

		//	Contact Us
		Route::get('adminInbox', 'UserMessagesController@loadInbox')->name('admin.contact.inbox');
		Route::put('adminInbox/{id}', 'UserMessagesController@editMessage')->name('admin.contact.editMessage');
		Route::get('adminInbox/{id}/show', 'UserMessagesController@showMessage')->name('admin.contact.showMessage');
		Route::delete('adminInbox/{id}', 'UserMessagesController@deleteMessage')->name('admin.contact.deleteMessage');
		Route::post('send', 'MailController@send')->name('admin.contact.sendEmail');

		Route::get('adminEMail', 'PageController@adminEMail');

		//	View Profiles
		Route::get('viewProfile/viewJobseekerProfile', 'PageController@viewJobseekerProfile');
		Route::get('viewProfile/viewJobseekerProfile/viewJobseekerResume', 'PageController@viewJobseekerResume');
		Route::get('viewProfile/viewEmployerProfile', 'PageController@viewEmployerProfile');
		Route::get('viewProfile/viewVacancy', 'PageController@viewVacancy');

		//	Searches
		Route::get('search/jobseekerSearchResults', 'PageController@jobseekerSearchResults');
		Route::get('search/employerSearchResults', 'PageController@employerSearchResults');
		Route::get('search/vacancySearchResults', 'PageController@vacancySearchResults');

		//	Questionnare
		Route::get('tests/questionnareBuilder', 'PageController@questionnareBuilder');
		Route::get('tests/questionnareUpload', 'PageController@questionnareUpload');
		Route::get('tests/addQuestion', 'PageController@addQuestion');
		Route::get('tests/editQuestion', 'PageController@editQuestion');
		Route::get('tests/viewQuestions', 'PageController@viewQuestions');


		//	Reports
		Route::get('reports/showReport/vacancyDetails','Reports\ReportsController@showVacancyReport')->name('admin.reports.vacancyDetails');
		Route::get('reports/showReport/employerDetails','Reports\ReportsController@showEmployerReport')->name('admin.reports.employerDetails');
		//	Add report routes here
	});
});

// Employer Routes
Route::group(['namespace' => 'Employer'], function() {
	Route::prefix('employer')->group(function() {
		Route::get('home', 'PageController@index')->name('employer.home');
		
		//	Auth
		Route::get('login', 'Auth\LoginController@showLoginForm')->name('employer.login');
		Route::post('login', 'Auth\LoginController@login');
		Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('employer.password.email');
		Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('employer.register');
		Route::post('register', 'Auth\RegisterController@register');
		Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('employer.password.request');
		Route::post('password/reset', 'Auth\ResetPasswordController@reset');
		Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('employer.password.reset');
		Route::post('logout', 'Auth\LoginController@logout')->name('employer.logout');

		//	Profile
		// Route::get('/home/profile', 'PageController@viewProfile')->name('employer.viewProfile');
		// Route::get('/home/registerProfile', 'PageController@registerProfile');
		Route::resource('/home/employerProfile', 'EmployerProfileController');
		Route::get('/home/employerProfile/profilePic/{id}', 'LogoUploadController@showUploadForm')->name('logo.upload');
		Route::put('/home/employerProfile/profilePic/{id}', 'LogoUploadController@uploadPicture');

		Route::resource('/home/registerProfile/employerAddress', 'EmployerAddressController');
		Route::get('/home/registerProfile/logoUpload', 'PageController@logoUpload');

		//	Vacancy Builder
		Route::resource('/home/vacancyBuilder/vacancy', 'VacancyController');
		Route::get('/home/vacancyBuilder/vacancies/{id}', 'VacancyController@index')->name('vacancies.index');
		Route::get('/home/vacancyBuilder/vacancy/{vacancy}', 'VacancyController@show')->name('vacancy.show');
		Route::put('/home/vacancyBuilder/vacancy/toggleVacancyStatus/{id}', 'VacancyController@toggleVacancyStatus')->name('vacancy.toggleVacancyStatus');
		Route::resource('/home/vacancyBuilder/vacancy/vacancyAddress', 'VacancyAddressController');
		Route::resource('/home/vacancyBuilder/vacancy/vacancySkills', 'VacancySkillsController');

		Route::get('/home/vacancyBuilder/viewVacancy', 'PageController@viewVacancy');
		Route::get('/home/vacancyBuilder/openVacancy', 'PageController@openVacancy');
		Route::get('/home/vacancyBuilder/editVacancy', 'PageController@editVacancy');
		Route::get('/home/vacancyBuilder/vacancySkills', 'PageController@vacancySkills');
		Route::get('/home/vacancyBuilder/vacancyAddress', 'PageController@vacancyAddress');
		Route::get('/home/vacancyBuilder/vacancyLinkQuestion/{id}', 'QuestionnaireVacancyController@showLinkingPage')->name('vacancy.questionnare.link');
		Route::post('/home/vacancyBuilder/vacancyLinkQuestion', 'QuestionnaireVacancyController@storeLink')->name('vacancy.questionnare.storeLink');
		Route::post('/home/vacancyBuilder/vacancyLinkQuestion/{id}', 'QuestionnaireVacancyController@storeLink')->name('vacancy.questionnare.storeUnLink');

		//	Questionnare Builder
		Route::resource('/home/tests/questionnareBuilder', 'QuestionnaireController');
		Route::get('/home/tests/questionnareUpload', 'PageController@questionnareUpload')->name('questionnare.upload');
		Route::get('/home/tests/addQuestion', 'PageController@addQuestion');
		Route::get('/home/tests/editQuestion', 'PageController@editQuestion');
		Route::get('/home/tests/viewQuestions', 'PageController@viewQuestions');
		Route::resource('/home/tests/questionnareBuilder/question', 'QuestionsController');

		//	Search Jobseeker
		Route::get('/jobseekerSearchResults', 'PageController@jobseekerSearchResults');
		Route::get('/viewJobseekerProfile', 'PageController@viewJobseekerProfile');
		Route::get('/viewJobseekerResume', 'PageController@viewJobseekerResume');

		Route::get('/home/contactAdmin', 'PageController@contactAdmin');

		//	Reports
		Route::get('/home/reports/vacancyDetails', 'Reports\ReportsController@showVacancyReport')->name('employer.reports.vacancyDetails');
	});
});

//	Socialite Login
Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');

// JobSeeker Routes
Route::group(['namespace' => 'JobSeeker'], function() {
	Route::get('home', 'PageController@index')->name('home');
	
	//	Auth
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');


	//	Profile
	//Route::get('/home/profile', 'PageController@viewProfile')->name('viewProfile');
	//Route::get('/home/registerProfile', 'PageController@registerProfile');
	Route::resource('/home/profile', 'ProfileController');
	Route::get('/home/showAllProfiles/{id}', 'ProfileController@index')->name('profile.index');
	//Route::get('/home/registerProfile/profilePic', 'PageController@profilePic');
	Route::get('/home/profile/profilePic/{id}', 'ProfilePicUploadController@showUploadForm')->name('profilePic.upload');
	Route::put('/home/profile/profilePic/{id}', 'ProfilePicUploadController@uploadPicture');

	//	Resume Builder
	Route::get('/home/resumeBuilder', 'PageController@resumeBuilder');
	Route::get('/home/resumeBuilder/uploadResume', 'PageController@uploadResume');
	//Route::get('/home/resumeBuilder/registerAddress', 'PageController@registerAddress');
	Route::resource('/home/profile/address', 'JobseekerAddressController');
	//Route::get('/home/resumeBuilder/academicDetails', 'PageController@academicDetails');
	Route::resource('/home/resumeBuilder/academics', 'JobseekerAcademicsController');
	//Route::get('/home/resumeBuilder/registerSkills', 'PageController@registerSkills');
	Route::resource('/home/resumeBuilder/skills', 'JobseekerSkillsController');
	//Route::get('/home/resumeBuilder/registerExperience', 'PageController@registerExperience');
	Route::resource('/home/resumeBuilder/experience', 'JobseekerExperienceController');
	// Route::get('/home/resumeBuilder/registerAchievements', 'PageController@registerAchievements');
	Route::resource('/home/resumeBuilder/achievements', 'JobseekerAchievementsController');
	//Route::get('/home/resumeBuilder/miscDetails', 'PageController@miscDetails');
	Route::get('/home/resumeBuilder/miscDetails/{id}', 'ProfileController@editMisc')->name('miscDetails.edit');
	Route::put('/home/resumeBuilder/miscDetails/{id}', 'ProfileController@storeMisc')->name('miscDetails.store');
	//Route::get('/home/resumeBuilder/viewResume', 'PageController@viewResume');
	//Route::resource('/home/resumeBuilder/resume', 'JobseekerResumeController');
	Route::get('/home/resumeBuilder/resume/{id}', 'ResumeController@show')->name('resume.show');

	Route::get('/home/searchEmployer', 'PageController@searchEmployer');
	Route::get('/home/employerSearchResults', 'PageController@employerSearchResults');
	Route::get('/home/viewEmployerProfile', 'PageController@viewEmployerProfile');

	Route::get('/home/searchVacancy', 'PageController@searchVacancy');
	Route::get('/home/vacancySearchResults', 'PageController@vacancySearchResults');
	Route::get('/home/viewVacancy', 'PageController@viewVacancy');
	
	Route::get('/home/contactAdmin', 'PageController@contactAdmin');

	//test
	Route::get('/home/tests/questionnaireShow', 'PageController@questionnaireShow');
});