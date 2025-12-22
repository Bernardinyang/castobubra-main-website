<?php

use App\Http\Controllers\AcademicBoardController;
use App\Http\Controllers\AcademicStaffController;
use App\Http\Controllers\BoardOfTrusteeController;
use App\Http\Controllers\ComingSoon\ComingSoonController;
use App\Http\Controllers\Dashboard\CTAController;
use App\Http\Controllers\Dashboard\GalleryController;
use App\Http\Controllers\Dashboard\SliderImageController;
use App\Http\Controllers\Dashboard\StudentCommunityController;
use App\Http\Controllers\Dashboard\StudentNewsBarController;
use App\Http\Controllers\Dashboard\StudentSlideController;
use App\Http\Controllers\Dashboard\WebsiteNewsBarController;
use App\Http\Controllers\Dashboard\WelcomeSectionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ComingSoonSliderImageController;
use App\Http\Controllers\Editor\CategoryController;
use App\Http\Controllers\Editor\ImageController;
use App\Http\Controllers\Editor\PostController;
use App\Http\Controllers\Editor\TagController;
use App\Http\Controllers\IconController;
use App\Http\Controllers\NewsAlertController;
use App\Http\Controllers\NonAcademicStaffController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\SUGExcoController;
use App\Http\Controllers\SystemSettingController;
use App\Http\Controllers\SystemUserController;
use App\Http\Controllers\Website\WebsiteController;
use App\Http\Controllers\WiseTalkController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'sug'], function () {
    Route::get('/', [ComingSoonController::class, 'index'])->name('website.sug');
});

Route::get('/', [WebsiteController::class, 'index'])->name('website.home');
Route::get('/about-us', [WebsiteController::class, 'about'])->name('website.about');
Route::get('/our-identity', [WebsiteController::class, 'ourIdentity'])->name('website.our_identity');
Route::get('/contact-us', [WebsiteController::class, 'contact'])->name('website.contact');
Route::post('/contact-us', [WebsiteController::class, 'storeContact'])->name('website.contact.store');
Route::get('/vision-and-mission', [WebsiteController::class, 'visionAndMission'])->name('website.vision_and_mission');
Route::get('/governing-council', [WebsiteController::class, 'governingCouncil'])->name('website.leadership');
Route::get('/management-staff', [WebsiteController::class, 'academicBoard'])->name('website.academic_board');
Route::get('/academic-staffs', [WebsiteController::class, 'academicStaffs'])->name('website.academic_staff');
Route::get('/organizational-chart', [WebsiteController::class, 'organizationalChart'])->name('website.organizational_chart');
Route::get('/college-song', [WebsiteController::class, 'collegeSong'])->name('website.college_song');
Route::get('/requirement', [WebsiteController::class, 'entryRequirement'])->name('website.requirement');
Route::get('/fees', [WebsiteController::class, 'fees'])->name('website.fees');
Route::get('/courses', [WebsiteController::class, 'courses'])->name('website.courses');
Route::get('/departments', [WebsiteController::class, 'departments'])->name('website.departments');
Route::get('/nd-hnd-nursing', [WebsiteController::class, 'ndHndNursing'])->name('website.nd_hnd_nursing');
Route::get('/beware-of-fraudulent-activities', [WebsiteController::class, 'fraudulentActivities'])->name('website.fraudulent_activities');
Route::get('/news/{post:slug}', [WebsiteController::class, 'newsDetails'])->name('website.news.detail');
Route::get('/news', [WebsiteController::class, 'allNews'])->name('website.news');
Route::get('/news-alert/{news_alert:unique_id}', [WebsiteController::class, 'newsAlertDetails'])->name('website.news_alert.detail');
Route::get('/faq', [WebsiteController::class, 'faq'])->name('website.faq');

Route::get('/application-guidelines', [WebsiteController::class, 'admissionForm'])->name('website.application_guidelines');
Route::get('/application-instruction', [WebsiteController::class, 'applicationInstruction'])->name('website.application_instruction');
Route::get('/application', [\App\Http\Controllers\Website\ApplicationController::class, 'index'])->name('website.application');
Route::post('/application', [\App\Http\Controllers\Website\ApplicationController::class, 'store'])->name('website.application.store');

Route::get('/api/icons/search', [IconController::class, 'search'])->name('api.icons.search');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::group(['middleware' => ['role:admin,developer'], 'prefix' => 'admin'], function () {
        Route::get('/welcome-section', [WelcomeSectionController::class, 'edit'])->name('user.welcome-section');
        Route::put('/welcome-section', [WelcomeSectionController::class, 'update'])->name('user.welcome-section.update');

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
        Route::resource('slider-image', SliderImageController::class);
        Route::resource('gallery', GalleryController::class);
        Route::resource('programme', \App\Http\Controllers\Dashboard\ProgrammeController::class);
        
        Route::get('/applications', [\App\Http\Controllers\Dashboard\ApplicationController::class, 'index'])->name('application.index');
        Route::get('/applications/{id}', [\App\Http\Controllers\Dashboard\ApplicationController::class, 'show'])->name('application.show');
        Route::post('/applications/{id}/status', [\App\Http\Controllers\Dashboard\ApplicationController::class, 'updateStatus'])->name('application.updateStatus');
        Route::get('/applications/export/csv', [\App\Http\Controllers\Dashboard\ApplicationController::class, 'export'])->name('application.export');

        Route::resource('bot', BoardOfTrusteeController::class);
        Route::resource('academic-board', AcademicBoardController::class);
        Route::resource('academic-staff', AcademicStaffController::class);
        Route::resource('non-academic-staff', NonAcademicStaffController::class);
        Route::resource('sug-excos', SUGExcoController::class);
        Route::resource('wise-talk', WiseTalkController::class);
        Route::resource('faq', \App\Http\Controllers\Dashboard\FAQController::class);
        Route::resource('social-media', \App\Http\Controllers\Dashboard\SocialMediaController::class);
        Route::resource('coming-soon-slider-image', ComingSoonSliderImageController::class);
        Route::resource('subscriber', SubscriberController::class);

        Route::get('/contacts', [DashboardController::class, 'manageContacts'])->name('user.contacts');
        Route::get('/contact/{contact:unique_id}', [DashboardController::class, 'showContact'])->name('user.contact.show');
        Route::get('/sug-contacts', [DashboardController::class, 'manageSUGContacts'])->name('user.sug_contacts');
        Route::get('/sug-contact/{contact:unique_id}', [DashboardController::class, 'showSUGContact'])->name('user.sug_contact.show');
        Route::get('/subscribers', [DashboardController::class, 'manageSubscribers'])->name('user.subscribers');

        Route::get('/change-password', [DashboardController::class, 'changePasswordAction'])->name('user.profile.change_password');
        Route::post('/change-password/{id}', [DashboardController::class, 'changePassword'])->name('user.profile.change_password.edit');
        Route::get('/profile/activity', [DashboardController::class, 'profileActivityAction'])->name('user.profile.activity');

        Route::get('/post/publish/{id}', [PostController::class, 'publish'])->name('post.publish');
        Route::resource('post', PostController::class);
        Route::resource('tag', TagController::class);
        Route::resource('category', CategoryController::class);
        Route::post('image', [ImageController::class, 'store'])->name('image.store');

         Route::get('/activate-news-bar/{id}', [WebsiteNewsBarController::class, 'activateNewsBar'])->name('news-bar.activate');
        Route::get('/deactivate-news-bar/{id}', [WebsiteNewsBarController::class, 'deactivateNewsBar'])->name('news-bar.deactivate');
        Route::resource('news-bar', WebsiteNewsBarController::class);
        Route::resource('student-news-bar', StudentNewsBarController::class);
        Route::resource('student-slide', StudentSlideController::class);

        Route::get('/activate-news-alert/{id}', [NewsAlertController::class, 'activateNewsAlert'])->name('user.news-alert.activate');
        Route::get('/deactivate-news-alert/{id}', [NewsAlertController::class, 'deactivateNewsAlert'])->name('user.news-alert.deactivate');
        Route::resource('news-alert', NewsAlertController::class);

        Route::get('/student-community', [StudentCommunityController::class, 'create'])->name('user.student.community');
        Route::put('/student-community/update', [StudentCommunityController::class, 'update'])->name('user.student.community.store');

        Route::get('/cta', [CTAController::class, 'create'])->name('user.cta');
        Route::put('/cta/update', [CTAController::class, 'update'])->name('user.cta.store');
    });

    Route::group(['middleware' => ['auth', 'role:developer'], 'prefix' => 'admin'], function () {
        Route::resource('system_user', SystemUserController::class);
        Route::delete('/delete-contact/{unique_id}', [DashboardController::class, 'deleteContact'])->name('user.contact.destroy');
        Route::post('/reply-contact/{unique_id}', [DashboardController::class, 'replyContact'])->name('user.contact.reply');
        Route::delete('/delete-sug-contact/{unique_id}', [DashboardController::class, 'deleteSUGContact'])->name('user.sug_contact.destroy');
        Route::get('/system-settings', [SystemSettingController::class, 'create'])->name('user.settings');
        Route::put('/system-settings/update', [SystemSettingController::class, 'update'])->name('user.settings.store');
        Route::put('/system-settings/server/update', [SystemSettingController::class, 'serverUpdate'])->name('user.settings.server.store');
    });
});

require __DIR__ . '/auth.php';
